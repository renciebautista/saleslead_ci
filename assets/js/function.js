$.fn.select_chain = function(child,url,default_value,group_value)
{
    $(child).attr("disabled","disabled");
    $(this).on("change",function(){
        if($(this).val() == 0){
            $(child).attr("disabled","disabled");
            $(child).html("<option value='0'>"+default_value+"</option>");
        }else{
            $(child).attr("disabled","disabled");
            $(child).html("<option>RETRIEVING RECORDS...</option>");
            $.get(url+$(this).val(), function(data){
                $(child).removeAttr("disabled");
                $(child).html("<option value='0'>"+default_value+"</option>");

                if(data[group_value] != ""){
                    $.each (data[group_value], function (key) {
                        $('<option />', {value: key, text: data[group_value][key]}).appendTo($(child));       
                    });
                }else{
                    $(child).attr("disabled","disabled");
                    $(child).html("<option value='0'>NO RECORD FOUND</option>");
                }

            });
        }
    });
};