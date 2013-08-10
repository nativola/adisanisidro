/* Intro_Screen
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

import com.actionbarsherlock.app.SherlockActivity;
import com.actionbarsherlock.view.Menu;
import com.actionbarsherlock.view.MenuInflater;
import com.example.self_guidedtour.DB.DB_SelfGuided;

import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.res.TypedArray;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.BaseAdapter;
import android.widget.Gallery;
import android.widget.ImageView;


/**
 * This class contains the introduction screen of the
 * Application this class calls the map.
 * 
 * @author Nixon Espinoza, Mauricio Jiménez, Jeudy Ramírez.
 *
 */
public class Intro_Screen extends SherlockActivity {
	/**MARCADOR are used to get the "identifier" of the map markers, it because
	 * we can't find a better option to get the reference.
	 * MARCADOR saves the name of the marker */
	public static String MARCADOR="";
	public static int id_item;
	
	/**
	 * para la galería de inicio
	 * */
	//variable for selection intent
	private final int PICKER = 1;
	//variable to store the currently selected image
	private int currentPic = 0;
	//gallery object
	private Gallery picGallery;
	//adapter for gallery view
	private PicAdapter imgAdapt;
	
	private Context mctx;
	
	/**Constructor that creates the user interface in android, calling the
	 * xml file that are located in the layout folder.
	 * The xml are called activity_intro_screen */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		//Se abre la BD
				DB_SelfGuided usdbh =
			            new DB_SelfGuided(this, "DBSelfGuided", null, 1);
			 
			        SQLiteDatabase db = usdbh.getWritableDatabase();
			 
			        //Si hemos abierto correctamente la base de datos
			        if(db != null)
			        {	 
			        	try {
			                //insertar datos en la tabla
			        		db.execSQL("INSERT INTO Flora (nombre, nombreCientif, info, moreinfo, punto) " +
			        					"VALUES ('Almendro','Dipteryx panamensis','Sus frutos atraen diversas especies de aves, entre ellas las lapas.','http://www.adisanisidro.com/almendro.html',8)");
			        		}//try
			        	catch (Exception e) {
							// TODO: handle exception
						}
			            db.close();
			        }
		
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_intro__screen);
				//get the gallery view
				picGallery = (Gallery) findViewById(R.id.gallery);
				//create a new adapter
				imgAdapt = new PicAdapter(this);
				//set the gallery adapter
				picGallery.setAdapter(imgAdapt);
				
				mctx=this;
				
				picGallery.setOnItemClickListener(new OnItemClickListener() {
		 		    //handle clicks
		 		    public void onItemClick(AdapterView<?> parent, View v, int position, long id) {
		 		    	show_map_zone();
		 		    }
		 		});
		
	}

	/**Constructor that creates the user interface menu in android, calling the
	 * xml file that are located in the menu folder.
	 * The xml are called intro_screen */
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		MenuInflater inflater = getSupportMenuInflater();
		inflater.inflate(R.menu.intro__screen, menu);
		return true;
	}

	/** Create the intent to show the map in the screen*/
	public void show_map_zone() {
		//Calls the inClick event in intro button
		Intent i = new Intent(mctx,Zone_map.class);
		startActivity(i);
	}
	
	

	
	public class PicAdapter extends BaseAdapter {
		//use the default gallery background image
		int defaultItemBackground;
		//gallery context
		private Context galleryContext;
		//array to store bitmaps to display
		private Bitmap[] imageBitmaps;
		//placeholder bitmap for empty spaces in gallery
		Bitmap placeholder;
		
			public PicAdapter(Context c) {
			    //instantiate context
			    galleryContext = c;
			    //create bitmap array
			    imageBitmaps  = new Bitmap[4];
			    //decode the placeholder image
			    placeholder = BitmapFactory.decodeResource(getResources(), R.drawable.logo1);
			    imageBitmaps[0]=placeholder;
			    placeholder = BitmapFactory.decodeResource(getResources(), R.drawable.logo2);
			    imageBitmaps[1]=placeholder;
			    placeholder = BitmapFactory.decodeResource(getResources(), R.drawable.logo3);
			    imageBitmaps[2]=placeholder;
			    placeholder = BitmapFactory.decodeResource(getResources(), R.drawable.logo4);
			    imageBitmaps[3]=placeholder;
			  //get the styling attributes - use default Andorid system resources
			    TypedArray styleAttrs = galleryContext.obtainStyledAttributes(R.styleable.PicGallery);
			    //get the background resource
			    defaultItemBackground = styleAttrs.getResourceId(
			        R.styleable.PicGallery_android_galleryItemBackground, 0);
			    //recycle attributes
			    styleAttrs.recycle();
		}
			
			//return number of data items i.e. bitmap images
			public int getCount() {
			    return imageBitmaps.length;
			}
			
			//return item at specified position
			public Object getItem(int position) {
			    return position;
			}
			
			//return item ID at specified position
			public long getItemId(int position) {
			    return position;
			}
			
			//get view specifies layout and display options for each thumbnail in the gallery
			public View getView(int position, View convertView, ViewGroup parent) {
			    //create the view
			    ImageView imageView = new ImageView(galleryContext);
			    //specify the bitmap at this position in the array
			    imageView.setImageBitmap(imageBitmaps[position]);
			    //set layout options
			    //imageView.setLayoutParams(new Gallery.LayoutParams(250, 200));//acá el tamañp de Thubnails
			    //scale type within view area
			    imageView.setScaleType(ImageView.ScaleType.FIT_CENTER);
			    //set default gallery item background
			    imageView.setBackgroundResource(defaultItemBackground);
			    //return the view
			    return imageView;
			}
			
	}
	
	
}
