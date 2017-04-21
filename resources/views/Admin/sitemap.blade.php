<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($usuarioServicioCache as $servicio)
@if($servicio->nombre_servicio!="")
    <url>
        <loc>https://iwanatrip.com/detalle/{{htmlspecialchars(htmlentities($servicio->nombre_servicio))}}/{{$servicio->id}}</loc>
    <lastmod>{{ gmdate(DateTime::W3C, strtotime($servicio->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endif
@endforeach


</urlset>

