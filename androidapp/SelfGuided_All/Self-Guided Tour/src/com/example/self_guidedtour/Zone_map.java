/* Zone_map
 *
 * Fist version 
 *
 * 08/5/2013
 * 
 *This software is the confidential and proprietary information of:
 *	Nixon Espinoza Matamoros. 
 *	Mauricio Jiménez Gutiérrez.
 *	Jeudy Ramírez Trejos. 
 */

package com.example.self_guidedtour;

import com.google.android.gms.maps.CameraUpdate;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.GoogleMap.InfoWindowAdapter;
import com.google.android.gms.maps.GoogleMap.OnInfoWindowClickListener;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.maps.model.PolylineOptions;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.location.Criteria;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
//import android.view.Menu;
//import android.view.MenuItem;
import android.view.View;
import android.support.v4.app.*;

import com.actionbarsherlock.app.SherlockFragmentActivity;
import com.actionbarsherlock.view.Menu;
import com.actionbarsherlock.view.MenuInflater;
import com.actionbarsherlock.view.MenuItem;

/**
 * Class that contains the map functions, map UI.
 * Calls the map_zone.xml.
 * Contains GPS functions.
 * */
public class Zone_map extends SherlockFragmentActivity implements LocationListener {
	 /**
	  * mapa = Get a GoogleMap reference.
	  * locationManager= Used to get reference about user location.
	  * proveedor= Used to know which kind of localization use.
	  * */
	private GoogleMap mapa=null;
	private LocationManager locationManager;
	private String proveedor;
	
	/**
	 * Calls the map_zone UI.
	 * Set the corresponding references to the variables.
	 * Set the map properties and functions.
	 * */
    @Override
    protected void onCreate(Bundle savedInstanceState) {
    super.onCreate(savedInstanceState);
    setContentView(R.layout.map_zone);
    
    /**
     * Set the map object in the mapa variable.
     * */
     mapa = ((SupportMapFragment) getSupportFragmentManager()
			   .findFragmentById(R.id.map)).getMap();
    
     /**Set the camera in the Chachagua-Picueca guide zone, 
      * whit a 16x Zoom in camUpd2 variable.
      */
     CameraUpdate camUpd2 = CameraUpdateFactory.newLatLngZoom(
    		new LatLng(10.38996, -84.580479), 16F);
    
     	//Set the map type in satellite view.
    	mapa.setMapType(GoogleMap.MAP_TYPE_SATELLITE);
    	//Set the camera in the map
		mapa.animateCamera(camUpd2);
		//Mark the user in the map, whit a blue point and the respective button.
		mapa.setMyLocationEnabled(true);
		
	//get user position
	locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
	
	/**Definition of a Criteria Object, this object select the 
	 * best choice to know  the location based in the service,
	 * it is specified in the AndroidManifest, we use 2 types, 
	 * COARSE_LOCATION and FINE_LOCATION*/
    Criteria criteria = new Criteria();
    proveedor = locationManager.getBestProvider(criteria, false);
    
    mapa.setOnInfoWindowClickListener(new OnInfoWindowClickListener() {
		
    	/**
    	 * Set a action when the user tap's a marker, 
    	 * here the MARCADOR variable gets the marker title
    	 * and calls the tabs.
    	 * */
		@Override
		public void onInfoWindowClick(Marker marker) {
			// TODO Auto-generated method stub
			//Get title
			Intro_Screen.MARCADOR=marker.getTitle().toString();
			//Call tabs.
			show_tabs();
		}
	});
    
   
    /**
     * Used to show the "bubble" over the marker when taped.
     * We use the default bubble.
     * */
    mapa.setInfoWindowAdapter(new InfoWindowAdapter() {
		
		@Override
		public View getInfoWindow(Marker marker) {
			// TODO Auto-generated method stub
			return null;
		}
		
		@Override
		public View getInfoContents(Marker marker) {
			return null;
			 //
		}
	});//InfoWindow
    
    
    
    }//oncreate

    
    /*Update the user location in the map*/
    @Override
    protected void onResume() {
      super.onResume();
      locationManager.requestLocationUpdates(proveedor,10, 1, this);
    }
    

    /*Stop the Listener to draw the user location */
    @Override
    protected void onPause() {
      super.onPause();
      locationManager.removeUpdates(this);
    }

    @Override
    public void onLocationChanged(Location location) {
    }
    
   
    @Override
    public void onStatusChanged(String provider, int status, Bundle extras) {
      // Override the LocationListener
    }
   
   
    @Override
    public void onProviderEnabled(String provider) {
    	// Provider Enabled
    }
   
    @Override
    public void onProviderDisabled(String provider) {
    	//Provider Disabled
    	}
    
    /**
     * Creates the emergent menu, whit 3 options, show markers,
     * show routes and clear map objects.
     * */
    @Override
	public boolean onCreateOptionsMenu(Menu menu) {
    	MenuInflater inflater = getSupportMenuInflater();
    	inflater.inflate(R.menu.activity_mp_zone, menu);
		return true;
	}
    
    
    /**
     * Calls the selected function in the xml or android UI
     * 
     * */
    @Override
	public boolean onOptionsItemSelected(MenuItem item) 
	{	
    	switch(item.getItemId())
		{
			case R.id.menu_marcadores:// If the user taps the way points the markets will be draw.
				mostrarMarcador();
				break;
			case R.id.menu_lineas:// If the user taps the route, the route will be draw.
				mostrarLineas();
				break;
			case R.id.menu_clear:// If the user taps the route, the map will be clear.
				clear();
				break;
		}

		return super.onOptionsItemSelected(item);
	}
    
    /**
     * Clear map objects
     * */
    private void clear() {
    	mapa.clear();
    }
    
    /**
     * Draw each marker in the map UI.
     * */
    private void mostrarMarcador()
	{
    	mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.387654, -84.580185))//Coco Loco
        .title("Stage 1: Coco Loco >>"));
    	
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.388386, -84.580836))//Trapiche
        .title("Stage 2: Trapiche >>"));
		
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.390155, -84.581216))//Plantas Ornamentales
        .title("Stage 3: Platas Ornamentales >>"));
		
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.391953, -84.582003))//Árbol de Guarumo
        .title("Check out: Guarumo Tree >>"));
		
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.392453, -84.580958))//Poza Perro de Agua
        .title("Stage 4: Poza >>"));
		
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.392075, -84.579547))//Colonia de Zompopas
        .title("Stage 5: Colonia de Zompopas >>"));
		
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.392703, -84.577261))//Medición de Aguas
        .title("Stage 6: Medición de Aguas >>"));
		
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.391622, -84.578164))//Humedal
        .title("Stage 7: Humedal >>"));
		
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.390372, -84.579264))//Árbol de Almendro
        .title("Stage 8: Árbol de Almendro >>"));
		
		mapa.addMarker(new MarkerOptions()
        .position(new LatLng(10.389119, -84.580025))//Fruta de Pan
        .title("Stage 9: Árbol Fruta de Pan >>"));
	}
    
    /**
     * Draws the route, it could be point by point,
     * drawing a line between two points
     * */
    private void mostrarLineas()
	{
		//Dibujo con Lineas

		PolylineOptions lineas = new PolylineOptions()
	        .add(new LatLng(10.387654, -84.580185))//coco loco pin
	        .add(new LatLng(10.388019, -84.580377))//intersección
	        .add(new LatLng(10.387892, -84.580628))//calle, orilla
	        .add(new LatLng(10.387944, -84.580723))//calle, orilla2
	        .add(new LatLng(10.3881, -84.580763))//dennis 1
	        .add(new LatLng(10.3882, -84.580733))//dennis 2
	        .add(new LatLng(10.388345, -84.580795))//trapiche10.388384
	        .add(new LatLng(10.388384, -84.580928))//salida trapiche
	        .add(new LatLng(10.388664, -84.580634))//primera vuelta
	        .add(new LatLng(10.389172, -84.580974))//cruce galerón
	        .add(new LatLng(10.390102, -84.581243))//vuelta 2
	        .add(new LatLng(10.38962, -84.582002))//cruce vuelta 2
	        .add(new LatLng(10.39074, -84.582238))//galería bosque dennis
	        .add(new LatLng(10.391717, -84.581895))//casi la union
	        .add(new LatLng(10.391817, -84.581997))//arco unión 1
	        .add(new LatLng(10.392096, -84.581766))//colindancia
	        .add(new LatLng(10.392381, -84.581037))//poza
	        .add(new LatLng(10.392381, -84.581069))//poza 1
	        .add(new LatLng(10.392244, -84.581044))//poza s2
	        .add(new LatLng(10.391981, -84.580758))//poza s3
	        .add(new LatLng(10.391981, -84.580758))//poza s3
	        .add(new LatLng(10.3919, -84.580553))//poza-zompopa 1
	        .add(new LatLng(10.391922, -84.580061))//poza-zompopa 2
	        .add(new LatLng(10.392097, -84.579553))//zompopa
	        .add(new LatLng(10.392575, -84.578436))//zompopa-cruce 1
	        .add(new LatLng(10.392594, -84.577975))//zompopa-cruce 2
	        .add(new LatLng(10.392633, -84.577556))//cruce -1
	        .add(new LatLng(10.392703, -84.577261))//cruce 
	        .add(new LatLng(10.392231, -84.577531))//cruce-humedal
	        .add(new LatLng(10.391594, -84.578122))//humedal
	        .add(new LatLng(10.391494, -84.578228))//humedal-almendro
	        .add(new LatLng(10.391261, -84.578614))//humedal-almendro 1
	        .add(new LatLng(10.391219, -84.578597))//humedal-almendro 2
	        .add(new LatLng(10.391164, -84.578503))//humedal-almendro 3
	        .add(new LatLng(10.391117, -84.578489))//humedal-almendro 4
	        .add(new LatLng(10.390458, -84.579161))//humedal-almendro 5
	        .add(new LatLng(10.390278, -84.579139))//almendro 1
	        .add(new LatLng(10.390211, -84.579153))//almendro 2
	        .add(new LatLng(10.390167, -84.579206))//almendro 3
	        .add(new LatLng(10.389919, -84.580064))//a-f 1
	        .add(new LatLng(10.389697, -84.579978))//a-f 2
	        .add(new LatLng(10.389256, -84.580019))//fp 1
	        .add(new LatLng(10.389008, -84.580083))//fp 2
	        .add(new LatLng(10.388422, -84.580078))//ex 1
	        .add(new LatLng(10.388208, -84.580292))//ex 2
	        .add(new LatLng(10.388019, -84.580377))//ex 3
	        ;

		lineas.width(2);
		lineas.color(Color.RED);
		mapa.addPolyline(lineas);}
    
    /**
     * Show the tabs UI.
     * */
    public void show_tabs() {
		Intent i = new Intent(this,Main_Tabs.class);
		startActivity(i);
	}
}