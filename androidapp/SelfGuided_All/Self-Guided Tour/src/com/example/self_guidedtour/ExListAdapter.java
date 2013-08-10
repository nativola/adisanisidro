/* ExListAdapter
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
import android.database.DataSetObserver;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseExpandableListAdapter;
import android.widget.ImageView;
import android.widget.TextView;
 
import java.util.ArrayList;

/**
 * This class contains the adapter to add each item in the ExpandableList
 * 
 * @author Nixon Espinoza, Mauricio Jiménez, Jeudy Ramírez.
 *
 */

public class ExListAdapter extends BaseExpandableListAdapter {
	/**inflater are used to inflate each item in the list
	 * mParent is used to set each object
	 * */
    private LayoutInflater inflater;
    private ArrayList<Parent> mParent;
 
    /**Inflates the adapter in the layout
     * */
    public ExListAdapter(Context context, ArrayList<Parent> parent){
        mParent = parent;
        inflater = LayoutInflater.from(context);
    }
 
 
    @Override
    /**counts the number of object
    *items so the list knows how many times calls getGroupView() method
    */
    public int getGroupCount() {
        return mParent.size();
    }
 
    @Override
    /**counts the number of children items so the list knows how many 
     * times calls getChildView() method
    */
    public int getChildrenCount(int i) {
        return mParent.get(i).getArrayChildren().size();
    }
 
    @Override
    /**Get the title of each Parent object
    */
    public Object getGroup(int i) {
        return mParent.get(i).getTitle();
    }
 
    @Override
    /**Get the name of each item
     * */
    public Object getChild(int i, int i1) {
        return mParent.get(i).getArrayChildren().get(i1);
    }
 
    /**Auto-generated
     * */
    @Override
    public long getGroupId(int i) {
        return i;
    }
 
    /**Auto-generated
     * */
    @Override
    public long getChildId(int i, int i1) {
        return i1;
    }
 
    /**Auto-generated
     * */
    @Override
    public boolean hasStableIds() {
        return true;
    }
 

    /**Set the Object name in the list, and the respectively icon.
     * Inside are located some if that validates where marker calls the
     * tabs, depends on the MARCADOR nad position
     * */
    @Override
    public View getGroupView(int i, boolean b, View view, ViewGroup viewGroup) {
 
        if (view == null) {
            view = inflater.inflate(R.layout.list_item_parent, viewGroup,false);
        }
 
        TextView textView = (TextView) view.findViewById(R.id.list_item_text_view);
        //"i" is the position of the parent/group in the list
        textView.setText(getGroup(i).toString());
        ImageView imagen = (ImageView) view.findViewById(R.id.img);
        
        /**
         * Check the MARCADOR string, to know which comparison use.
         * After, comes to set the image in every object of the list.
         * 
         * */
        if(Intro_Screen.MARCADOR.equals("Stage 1: Coco Loco >>")) {
        	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Hablar0")) {
        	}
        	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//coco-loco
        
        ////
        else if(Intro_Screen.MARCADOR.equals("Stage 2: Trapiche >>")) {
        	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//trapiche

        else if(Intro_Screen.MARCADOR.equals("Stage 3: Platas Ornamentales >>")) {
	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}

	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//plantas ornamentales

        else if(Intro_Screen.MARCADOR.equals("Check out: Guarumo Tree >>")) {
	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
		imagen.setImageResource(R.drawable.heliconia);
        	}
	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//guarumo
        
        else if(Intro_Screen.MARCADOR.equals("Stage 4: Poza >>")) {
        	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
		imagen.setImageResource(R.drawable.heliconia);
        	}
	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//poza
        
        else if(Intro_Screen.MARCADOR.equals("Stage 5: Colonia de Zompopas >>")) {
        	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
		imagen.setImageResource(R.drawable.heliconia);
        	}
	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//czompopas
        
        else if(Intro_Screen.MARCADOR.equals("Stage 6: Medición de Aguas >>")) {
        	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
		imagen.setImageResource(R.drawable.heliconia);
        	}
	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//aguas
        
        else if(Intro_Screen.MARCADOR.equals("Stage 7: Humedal >>")) {
        	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Hablar0")) {
        	}
	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//humedal

        else if(Intro_Screen.MARCADOR.equals("Stage 8: Árbol de Almendro >>")) {
        	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Hablar8.0")) {
        	}
	
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//Almendro
        
        else if(Intro_Screen.MARCADOR.equals("Stage 9: Árbol Fruta de Pan >>")) {
        	
        	if(textView.getText().toString().equals("Heliconia1.0")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else if(textView.getText().toString().equals("Heliconia1.1")) {
        		imagen.setImageResource(R.drawable.heliconia);
        	}
        	else {imagen.setImageResource(R.drawable.no_image);}
        }//fruta de pan

 
        //return the entire view
        return view;
    }
 
    @Override
    //in this method you must set the text to see the children on the list
    public View getChildView(int i, int i1, boolean b, View view, ViewGroup viewGroup) {
        if (view == null) {
            view = inflater.inflate(R.layout.list_item_child, viewGroup,false);
        }
 
        TextView textView = (TextView) view.findViewById(R.id.list_item_text_child);
        //"i" is the position of the parent/group in the list and 
        //"i1" is the position of the child
        textView.setText(mParent.get(i).getArrayChildren().get(i1));
 
        //return the entire view
        return view;
    }
 
    /**
     * Auto-Generated
     * */
    @Override
    public boolean isChildSelectable(int i, int i1) {
        return true;
    }
 
    @Override
    public void registerDataSetObserver(DataSetObserver observer) {
        /* used to make the notifyDataSetChanged() method work */
        super.registerDataSetObserver(observer);
    }
}