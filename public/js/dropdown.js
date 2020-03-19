$("#investigation_group_id").change(function(event){
    $.get("researchers/"+event.target.value+"",function(response, investigation_group_id){
        $("#researchers").empty();
        for(i=0;i<response.length; i++){
            $("#researchers").append("<option value = '"+response[i].id+"'> "+response[i].researcher_name+"</option>");
        }
    })
});