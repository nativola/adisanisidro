/* Galeria
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

import android.content.Context;
import android.content.Intent;
import android.content.res.TypedArray;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.AdapterView.OnItemLongClickListener;
import android.widget.BaseAdapter;
import android.widget.Gallery;
import android.widget.ImageView;

import com.actionbarsherlock.app.SherlockActivity;
import com.actionbarsherlock.view.Menu;
import com.actionbarsherlock.view.MenuInflater;
import com.actionbarsherlock.view.MenuItem;

/**
 * This class contains the gallery screen and her corresponding methods
 * Application this class calls the map.
 * 
 * @author Nixon Espinoza, Mauricio Jiménez, Jeudy Ramírez.
 *
 */

public class Galeria extends SherlockActivity{
			//variable for selection intent
			private final int PICKER = 1;
			//variable to store the currently selected image
			private int currentPic = 0;
			//gallery object
			private Gallery picGallery;
			//image view for larger display
			private ImageView picView;
			//adapter for gallery view
			private PicAdapter imgAdapt;
			

			/**
			 * Calls the layout, and set the reference of the objects
			 * */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.galeria);
		//get the large image view
		picView = (ImageView) findViewById(R.id.picture);
		//get the gallery view
		picGallery = (Gallery) findViewById(R.id.gallery);
		//create a new adapter
		imgAdapt = new PicAdapter(this);
		//set the gallery adapter
		picGallery.setAdapter(imgAdapt);		
	}
	
	/**
	 * Class that set the images in the list, and enables the user to put their own
	 * images here.
	 * */
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
			    imageBitmaps  = new Bitmap[6];
			    //decode the placeholder image
			    placeholder = BitmapFactory.decodeResource(getResources(), R.drawable.arenal);
			    imageBitmaps[0]=placeholder;
			    placeholder = BitmapFactory.decodeResource(getResources(), R.drawable.waterfall2);
			    imageBitmaps[1]=placeholder;
			    placeholder = BitmapFactory.decodeResource(getResources(), R.drawable.atardecer);
			    imageBitmaps[2]=placeholder;
			    placeholder = BitmapFactory.decodeResource(getResources(), R.drawable.at2);
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
			    imageView.setLayoutParams(new Gallery.LayoutParams(300, 200));
			    //scale type within view area
			    imageView.setScaleType(ImageView.ScaleType.FIT_CENTER);
			    //set default gallery item background
			    imageView.setBackgroundResource(defaultItemBackground);
			    //return the view
			    return imageView;
			}
			//helper method to add a bitmap to the gallery when the user chooses one
			public void addPic(Bitmap newPic)
			{
			    //set at currently selected index
			    imageBitmaps[currentPic] = newPic;
			}
			
			//return bitmap at specified position for larger display
			public Bitmap getPic(int posn)
			{
			    //return bitmap at posn index
			    return imageBitmaps[posn];
			}
			
		
	}
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		if (resultCode == RESULT_OK) {
		    //check if we are returning from picture selection
		    if (requestCode == PICKER) {
		    	//the returned picture URI
		    	Uri pickedUri = data.getData();
		    	//declare the bitmap
		    	Bitmap pic = null;
		    	//declare the path string
		    	String imgPath = "";
		    	//retrieve the string using media data
		    	String[] medData = { MediaStore.Images.Media.DATA };
		    	//query the data
		    	Cursor picCursor = managedQuery(pickedUri, medData, null, null, null);
		    	if(picCursor!=null)
		    	{
		    	    //get the path string
		    	    int index = picCursor.getColumnIndexOrThrow(MediaStore.Images.Media.DATA);
		    	    picCursor.moveToFirst();
		    	    imgPath = picCursor.getString(index);
		    	}
		    	else
		    	    imgPath = pickedUri.getPath();
		    	//if we have a new URI attempt to decode the image bitmap
		    	if(pickedUri!=null) {
		    		//set the width and height we want to use as maximum display
		    		int targetWidth = 600;
		    		int targetHeight = 400;
		    		//create bitmap options to calculate and use sample size
		    		BitmapFactory.Options bmpOptions = new BitmapFactory.Options();
		    		//first decode image dimensions only - not the image bitmap itself
		    		bmpOptions.inJustDecodeBounds = true;
		    		BitmapFactory.decodeFile(imgPath, bmpOptions);
		    		//image width and height before sampling
		    		int currHeight = bmpOptions.outHeight;
		    		int currWidth = bmpOptions.outWidth;
		    		//variable to store new sample size
		    		int sampleSize = 1;
		    		//calculate the sample size if the existing size is larger than target size
		    		if (currHeight>targetHeight || currWidth>targetWidth)
		    		{
		    		    //use either width or height
		    		    if (currWidth>currHeight)
		    		        sampleSize = Math.round((float)currHeight/(float)targetHeight);
		    		    else
		    		        sampleSize = Math.round((float)currWidth/(float)targetWidth);
		    		}
		    		//use the new sample size
		    		bmpOptions.inSampleSize = sampleSize;
		    		//now decode the bitmap using sample options
		    		bmpOptions.inJustDecodeBounds = false;
		    		//get the file as a bitmap
		    		pic = BitmapFactory.decodeFile(imgPath, bmpOptions);
		    		//pass bitmap to ImageAdapter to add to array
		    		imgAdapt.addPic(pic);
		    		//redraw the gallery thumbnails to reflect the new addition
		    		picGallery.setAdapter(imgAdapt);
		    		//display the newly selected image at larger size
		    		picView.setImageBitmap(pic);
		    		//scale options
		    		picView.setScaleType(ImageView.ScaleType.FIT_CENTER);
		    	}
		    }
		}
		super.onActivityResult(requestCode, resultCode, data);
	}
	
	@Override
    public boolean onCreateOptionsMenu(Menu menu) {
        return true;
    }
	
	@Override
    public boolean onOptionsItemSelected(MenuItem item) {
        return true;
    }
	
	
}
