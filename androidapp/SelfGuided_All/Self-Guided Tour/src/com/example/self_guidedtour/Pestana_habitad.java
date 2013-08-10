/* Pestana_fauna
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


import java.util.ArrayList;

import com.actionbarsherlock.app.SherlockActivity;
import com.example.self_guidedtour.DB.DB_SelfGuided;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.ExpandableListView;
import android.widget.Toast;
import android.widget.ExpandableListView.OnChildClickListener;

/**
 * Class that contains the fauna object info, like add objects, and
 * her corresponding childrens or properties.
 * 
 * Calls the fragment or UI pestana_fauna.xml inside main_tabs
 * */
public class Pestana_habitad extends SherlockActivity{
	//set a variable mExpandableList to get the references
	private ExpandableListView mExpandableList;
	private SQLiteDatabase db;
	DB_SelfGuided usdbh =
            new DB_SelfGuided(this, "DBSelfGuided", null, 1);
	
	/**
	 * Create the UI interface and becomes to put objects
	 * inside the ExpandableList View, it depends in which 
	 * marker are the user, or zone in the map.
	 * */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.pestana_fauna);
		
		mExpandableList = (ExpandableListView)findViewById(R.id.expandable_list);
		  
        ArrayList<Parent> arrayParents = new ArrayList<Parent>();
        ArrayList<String> arrayChildren = new ArrayList<String>();
 
        /**Here we set the object and her characteristics
         * but it depends in the marker name, the name are saved in
         * the static variable MARCADOR, in the Intro_Screen class.
         * */
        
        db = usdbh.getWritableDatabase();
        
        if(Intro_Screen.MARCADOR.equals("Stage 1: Coco Loco >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre, nombreCientif, info FROM Fauna WHERE punto=1", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(2));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }//if Intro_Screen.MARCADOR=Stage 1: Coco Loco >>
 
        if(Intro_Screen.MARCADOR.equals("Stage 2: Trapiche >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre,nombreCientif, info FROM Fauna WHERE punto=2", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }//if stage 2
        
        if(Intro_Screen.MARCADOR.equals("Stage 3: Platas Ornamentales >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre,nombreCientif, info FROM Fauna WHERE punto=3", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }//if stage 3
        
        if(Intro_Screen.MARCADOR.equals("Check out: Guarumo Tree >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre,nombreCientif, info FROM Fauna WHERE punto=10", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }// stage 10
        
        if(Intro_Screen.MARCADOR.equals("Stage 5: Colonia de Zompopas >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre,nombreCientif, info FROM Fauna WHERE punto=5", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }// Stage 5
        
        if(Intro_Screen.MARCADOR.equals("Stage 6: Medición de Aguas >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre,nombreCientif, info FROM Fauna WHERE punto=6s", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }//stage 6
        
        if(Intro_Screen.MARCADOR.equals("Stage 7: Humedal >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre,nombreCientif, info FROM Fauna WHERE punto=7", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }//stage 7
        
        if(Intro_Screen.MARCADOR.equals("Stage 8: Árbol de Almendro >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre,nombreCientif, info FROM Fauna WHERE punto=8", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }// stage 8
        
        if(Intro_Screen.MARCADOR.equals("Stage 9: Árbol Fruta de Pan >>")) {
        	if(db != null){	 
 	        	Cursor c= db.rawQuery("SELECT nombre,nombreCientif, info FROM Fauna WHERE punto=9", null);
 	        	if(c.moveToFirst()) {
 	        		do {
 	        			Parent parent = new Parent();
 	                    parent.setTitle(c.getString(0)); 
 	                    arrayChildren = new ArrayList<String>();
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add(c.getString(1));
 	                    arrayChildren.add("Más información    >>");
 	                    parent.setArrayChildren(arrayChildren);
 	                    arrayParents.add(parent);
 	        		} while(c.moveToNext());//do
 	        	}//if move to first
 	            db.close();
 	        }//if open db
        }// Stage 9
 
        
        //sets the adapter that provides data to the list.
        mExpandableList.setAdapter(new ExListAdapter(this,arrayParents));
        
        mExpandableList.setOnChildClickListener(new OnChildClickListener() {
			
			@Override
			public boolean onChildClick(ExpandableListView parent, View v,
					int groupPosition, int childPosition, long id) {
				// groupPosition= Padre.  
				if(Intro_Screen.MARCADOR.equals("Stage 1: Coco Loco >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=1", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}
				
				else if (Intro_Screen.MARCADOR.equals("Stage 2: Trapiche >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=2", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				else if (Intro_Screen.MARCADOR.equals("Stage 3: Platas Ornamentales >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=3", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				else if (Intro_Screen.MARCADOR.equals("Check out: Guarumo Tree >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=10", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				else if (Intro_Screen.MARCADOR.equals("Stage 5: Colonia de Zompopas >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=5", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				else if (Intro_Screen.MARCADOR.equals("Stage 6: Medición de Aguas >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=6", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				else if (Intro_Screen.MARCADOR.equals("Stage 7: Humedal >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=7", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				else if (Intro_Screen.MARCADOR.equals("Stage 8: Árbol de Almendro >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=8", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				else if (Intro_Screen.MARCADOR.equals("Stage 9: Árbol Fruta de Pan >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=9", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				else if (Intro_Screen.MARCADOR.equals("Stage 4: Poza >>")) {
					if(childPosition==1) {
						db = usdbh.getWritableDatabase();
						if(db != null){	 
				        	Cursor c= db.rawQuery("SELECT moreinfo FROM Fauna WHERE punto=4", null);
				        	c.moveToPosition(groupPosition);
				        	Intro_Screen.id_item=groupPosition;
							Link_Activity.urls=c.getString(0);
				            db.close();
				        }//if open db
						show_web();
					}//childposition
				}//else if
				
				return false;
			}
		});//onClickListener
	
	}//onCreate
	
	public void show_web() {
		Intent i = new Intent(this,Link_Activity.class);
		startActivity(i);
	}
}
