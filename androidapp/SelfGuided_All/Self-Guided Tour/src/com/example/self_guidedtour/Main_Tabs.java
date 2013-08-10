/* Main_Tabs
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

import android.app.TabActivity;
import android.content.Intent;
import android.content.res.Resources;
import android.os.Bundle;
import android.widget.TabHost;

/**
 * This class controls the tabs of the application, these tabs 
 * show respectively the Activities, Fauna, and Flora
 * 
 * @author Nixon Espinoza, Mauricio Jiménez, Jeudy Ramírez.
 *
 */


@SuppressWarnings("deprecation")
public class Main_Tabs extends TabActivity {

	/**Constructor that creates the user interface in android, calling the
	 * xml file that are located in the layout folder.
	 * The xml are maint_tabs.
	 *  */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.main_tabs);
		getActionBar().hide();//oculta la actionBar
		//Get tabHost reference
		TabHost tabHost= getTabHost();
		//Get tab resources and reference.
		TabHost.TabSpec spec;
		//Create a intent variable.
		Intent intent;
			
		//Starts the intent to set the first tab.
		intent= new Intent().setClass(this, Pestana_flora.class);
		//Configuration of the tab.
		spec= tabHost.newTabSpec("pestana_flora").setIndicator("Flora").setContent(intent);
		//Loads the tab in tabHost.
		tabHost.addTab(spec);	
		
		//Starts the intent to set the first tab.
		intent= new Intent().setClass(this, Pestana_habitad.class);
		//Configuration of the tab.
		spec= tabHost.newTabSpec("pestana_fauna").setIndicator("Habitad").setContent(intent);
		//Loads the tab in tabHost.
		tabHost.addTab(spec);
		
		//Starts the intent to set the first tab.
		intent= new Intent().setClass(this, Pestana_actividades.class);
		//Configuration of the tab.
		spec= tabHost.newTabSpec("pestana_actividades").setIndicator("Actividades").setContent(intent);
		//Loads the tab in tabHost.
		tabHost.addTab(spec);
	}	
}
