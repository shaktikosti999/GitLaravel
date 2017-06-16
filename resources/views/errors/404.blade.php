<script>
  dataLayer = [];
</script>
<?php 
$data = \DB::table('error')->where('id','404')->first();
?>
{!!$data->cuerpo!!}
<script>
dataLayer.push ({ 'event': 'error404', 'pageError': '{{\Request::url()}}' });
</script>