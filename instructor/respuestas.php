
<script>
echo "esto es qid".$get['qid']
$('#manage-survey').submit(function(e){
  e.preventDefault()
 // start_load()
  alert_toast("Thank You.",'success') 
 $.ajax({
    url:'http://localhost/vproductivam/panel/ajax.php?action=save_answer',
    method:'POST',
    data:$(this).serialize(),
    success:function(resp){s
      if(resp == 1){
        alert_toast("Thank You.",'success')
        setTimeout(function(){
          location.href = 'http://localhost/vproductivam/instructor/'
        },2000)
      }
    }
  }) 
})
</script>
