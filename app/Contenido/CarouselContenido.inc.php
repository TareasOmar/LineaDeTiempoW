<?php

class CarouselContenido{
    
    //Carousel para Contenido
    public static function getCarouselContenido($conexion){
        $ol_inicio="<ol class='carousel-indicators'>";
        $ol_indices="";
        $ol_cierre="</ol>";
        
        $indice=0;
        
        $carousel_inicio="<div class='carousel-inner' role='listbox'>";
        $carousel_contenido="";
        $carousel_fin="</div>";
        
        try{
            $sql="SELECT Ruta FROM contenido";
            $sentencia=$conexion-> prepare($sql);
            $sentencia -> execute();
            $resultado=$sentencia->fetchAll();
            
            if(count($resultado)){
                foreach($resultado as $imagen){
                    if($indice==0){
                        $ol_indices=$ol_indices."<li data-target='#carousel-contenido' data-slide-to='".$indice."' class='active'></li>";
                        $carousel_contenido=$carousel_contenido."<div class='item active'><img src='".substr($imagen['Ruta'],23)."' class='img-responsive center-block' alt=''>"
                                . "</div>";
                    }else{
                        $ol_indices=$ol_indices."<li data-target='#carousel-contenido' data-slide-to='".$indice."'></li>";
                        $carousel_contenido=$carousel_contenido."<div class='item'><img src='".substr($imagen['Ruta'],23)."' class='img-responsive center-block' alt=''>"
                                . "</div>";
                    }
                    $indice++;
                }
            }else{
                echo("No hay contenidos que mostrar :(");
            }   
            //Hacemos los carruseles
            $carousel_head=$ol_inicio.$ol_indices.$ol_cierre;
            $carousel_body=$carousel_inicio.$carousel_contenido.$carousel_fin;
            
            }catch(PDOException $e){
            print "Error" . $e->getMessage();
        }
        
        return $carousel_head.  $carousel_body;
    }
    
    //Carousel para Contenido VIP
    public static function getCarouselContenidoVIP($conexion){
        $ol_inicio="<ol class='carousel-indicators'>";
        $ol_indices="";
        $ol_cierre="</ol>";
        
        $indice=0;
        
        $carousel_inicio="<div class='carousel-inner' role='listbox'>";
        $carousel_contenido="";
        $carousel_fin="</div>";
        
        try{
            $sql="SELECT Ruta FROM contenido_exclusivo";
            $sentencia=$conexion-> prepare($sql);
            $sentencia -> execute();
            $resultado=$sentencia->fetchAll();
            
            if(count($resultado)){
                foreach($resultado as $imagen){
                    if($indice==0){
                        $ol_indices=$ol_indices."<li data-target='#carousel-contenidoVIP' data-slide-to='".$indice."' class='active'></li>";
                        $carousel_contenido=$carousel_contenido."<div class='item active'><img src='".substr($imagen['Ruta'],23)."' class='img-responsive center-block' alt=''>"
                                . "</div>";
                    }else{
                        $ol_indices=$ol_indices."<li data-target='#carousel-contenidoVIP' data-slide-to='".$indice."'></li>";
                        $carousel_contenido=$carousel_contenido."<div class='item'><img src='".substr($imagen['Ruta'],23)."' class='img-responsive center-block' alt=''>"
                                . "</div>";
                    }
                    $indice++;
                }
            }else{
                echo("No hay contenidos que mostrar :(");
            }   
            //Hacemos los carruseles
            $carousel_head=$ol_inicio.$ol_indices.$ol_cierre;
            $carousel_body=$carousel_inicio.$carousel_contenido.$carousel_fin;
            
            }catch(PDOException $e){
            print "Error" . $e->getMessage();
        }
        
        return $carousel_head.  $carousel_body;
    }
    
    //Carousel para Trabajos
    public static function getCarouselTrabajos($conexion){
        $ol_inicio="<ol class='carousel-indicators'>";
        $ol_indices="";
        $ol_cierre="</ol>";
        
        $indice=0;
        
        $carousel_inicio="<div class='carousel-inner' role='listbox'>";
        $carousel_contenido="";
        $carousel_fin="</div>";
        
        try{
            $sql="SELECT Ruta FROM trabajos";
            $sentencia=$conexion-> prepare($sql);
            $sentencia -> execute();
            $resultado=$sentencia->fetchAll();
            
            if(count($resultado)){
                foreach($resultado as $imagen){
                    if($indice==0){
                        $ol_indices=$ol_indices."<li data-target='#carousel-trabajos' data-slide-to='".$indice."' class='active'></li>";
                        $carousel_contenido=$carousel_contenido."<div class='item active'><img src='".substr($imagen['Ruta'],23)."' class='img-responsive center-block' alt=''>"
                                . "</div>";
                    }else{
                        $ol_indices=$ol_indices."<li data-target='#carousel-trabajos' data-slide-to='".$indice."'></li>";
                        $carousel_contenido=$carousel_contenido."<div class='item'><img src='".substr($imagen['Ruta'],23)."' class='img-responsive center-block' alt=''>"
                                . "</div>";
                    }
                    $indice++;
                }
            }else{
                echo("No hay contenidos que mostrar :(");
            }   
            //Hacemos los carruseles
            $carousel_head=$ol_inicio.$ol_indices.$ol_cierre;
            $carousel_body=$carousel_inicio.$carousel_contenido.$carousel_fin;
            
            }catch(PDOException $e){
            print "Error" . $e->getMessage();
        }
        
        return $carousel_head.  $carousel_body;
    }
}