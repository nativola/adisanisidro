package com.example.self_guidedtour.DB;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteDatabase.CursorFactory;
import android.database.sqlite.SQLiteOpenHelper;

public class DB_SelfGuided extends SQLiteOpenHelper{

	public DB_SelfGuided(Context context, String name, CursorFactory factory, int version) {
		super(context, name, factory, version);
		// TODO Auto-generated constructor stub
	}

	//SQL Sentences to create the database tables.
	String sql_actividades = "CREATE TABLE Actividades(nombre TEXT UNIQUE,info TEXT," +
			" moreinfo TEXT, punto INTEGER NOT NULL)";
	
	String sql_flora = "CREATE TABLE Flora(nombre TEXT UNIQUE, nombreCientif TEXT, info TEXT," +
			" moreinfo TEXT, punto INTEGER NOT NULL)";
	
	String sql_fauna = "CREATE TABLE Fauna(nombre TEXT UNIQUE, nombreCientif TEXT, info TEXT," +
			" moreinfo TEXT, punto INTEGER NOT NULL)";

	@Override
	public void onCreate(SQLiteDatabase db) {
		// Ejecutar los query's
		try {
		db.execSQL(sql_actividades);
		db.execSQL(sql_flora);
		db.execSQL(sql_fauna);
		}catch (Exception e) {
			// TODO: handle exception
		}
	}

	@Override
	public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
		//Se elimina la versión anterior de la tabla
        db.execSQL("DROP TABLE IF EXISTS Actividades");
        db.execSQL("DROP TABLE IF EXISTS Flora");
        db.execSQL("DROP TABLE IF EXISTS Fauna");
 
        //Se crea la nueva versión de la tabla
        db.execSQL(sql_actividades);
        db.execSQL(sql_flora);
        db.execSQL(sql_fauna);
		
	}
	
}
