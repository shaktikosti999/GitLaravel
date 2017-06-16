<?php
namespace App\Models\front;

class index_model{

	static function paginas_simples(){
		$paginas_simples = \DB::table('contenido_simple as padre')
            ->select(
                'padre.id_contenido as id',
                'padre.estatus',
                'padre.link',
                'padre.contenido',
                'padre.contenido_extra',
                'hijo.nombre as hijo',
                'padre.nombre as titulo_padre',
                'padre.id_padre',
                'padre.menu_principal as menu_principal',
                'padre.menu_inferior as menu_inferior',
                'padre.slug',
                'padre.imagen_principal as imagen'               
            )
            ->leftjoin('contenido_simple as hijo','padre.id_contenido','=','hijo.id_padre')
            ->where('padre.eliminado',0)    
            ->where('padre.estatus',1)             
            ->orderBy('padre.orden','ASC')
            ->get();
        $pagina = array();
        foreach ($paginas_simples as $value) { //Guarda las páginas Padres
            if ($value->id_padre == 0) {                
               $pagina[$value->id] = (array)$value;  
            }            
        }
        foreach ($paginas_simples as $value) { //Guarda las páginas Hijas
            if ($value->id_padre != 0) {
                $pagina[$value->id_padre][] = (array)$value; 
            }          
        }        
		return $pagina;
	}

    static function paginas_destacadas()
    {
        $paginas_destacadas = \DB::table('contenido_simple as hijo')
            ->select(
                'hijo.id_contenido as id',
                'hijo.link',
                'hijo.contenido',
                'hijo.nombre',
                'hijo.imagen_principal as imagen',
                \DB::raw('CONCAT(padre.slug,"/",hijo.slug) as slug')
            )
            ->where('hijo.eliminado',0)    
            ->where('hijo.estatus',1)      
            ->where('hijo.destacado',1)       
            ->orderBy('hijo.orden','ASC')
            ->leftjoin('contenido_simple as padre','padre.id_contenido','=','hijo.id_padre')
            ->get();     
        return $paginas_destacadas;
    }
    
}