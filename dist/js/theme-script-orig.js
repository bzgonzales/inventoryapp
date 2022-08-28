
var isHttps = location.protocol.match(/https/);
var http = isHttps ? 'https://' : 'http://';
var site_url = http + location.host;
var site_url = site_url + '/bz_test';

$(document).ready(function () {

  //$('.selectpicker').selectpicker();
  $('.datepicker').datetimepicker({
      format: 'YYYY-MM-DD'
  });

  load_items();
  load_orders();

  $("form[name='login-form']").submit(function() {
    var data = {
      user_name: $("input[name='input-login-user-name']").val(),
      password: $("input[name='input-login-password']").val()
    }
    console.log(data);
    $.ajax({
      type: 'post',
      dataType: 'json',
      data: data,
      url: site_url + '/bz_test/request/login_verification/',
      beforeSend: function() {
        $("form[name='login-form']").find('input,textarea,select').each(function() {
          $(this).attr('disabled', 'disabled');
        });
        
      },
      success: function(response) {
        if (response.status == 'success') {
          location.href = response.url;
        } else if(response.status == 'inactive') {
          $("#login-form-notification").html('<div class="alert wf-alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Your account is not active yet.</div>').fadeIn();
        
        } else {
          $("#login-form-notification").html('<div class="alert wf-alert-danger alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Invalid Username or Password</div>').fadeIn();
        }
      },
      complete: function() {
        $("form[name='login-form']").find('input,textarea,select').each(function() {
          $(this).removeAttr('disabled');
        });
        
      }
    });
    
    return false;
  });

  $(document).on('click', '#submit-filter', function(event) {

    itemstable.ajax.reload();
    return false;

  });

  $(document).on('click', '#submit-filter-orders', function(event) {

    orderstable.ajax.reload();
    return false;

  });

    
  $(document).on('click', '#add-order-btn', function(event) {
    load_order_content('add');
  })

  $(document).on('click', '.call-order-modal', function(event) {

    var orderid = $(this).attr('data-order-id');
    load_order_content(orderid);

  })  

  $(document).on('click', '.save-changes-btn', function(event) {

    var status = $(this).attr('data-status');
    var orderid = $(this).attr('data-order-id');


    if($('#select-form-clients').val()===null){
      alert('Please select client.');
      return false;
    }

    if($('#zip_code').val()==''){
      alert('Zip Code is required.');
      return false;
    }

    var data = {
      status: status,
      orderid: orderid,
      client: $('#select-form-clients').val(),
      deliverydate: $('#deliverydate').val(),
      custname: $('#cust_name').val(),
      custaddress: $('#cust_address').val(),
      zipcode: $('#zip_code').val(),
    }


    $.ajax({
      type: 'post',
      dataType: 'json',
      data: data,
      url: site_url + '/request/save_order_data/',
      beforeSend: function() {
        
      },
      success: function(response) {
        
        if(response.success=='error'){
          alert('Saving '+response.success+'.');
        }else{
          alert('Order Detail has been '+response.success+'.');
        }
        
        //jQuery('#order-modal').modal('hide');
        jQuery('#close-button').trigger('click');
        orderstable.ajax.reload();
      },
      complete: function() {
        
      }
    });
    
    return false;

  })

});



window.mobilecheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};


  function load_order_content(order_id){

    var data = {
      order_id: order_id,
    }

    $.ajax({
      type: 'post',
      dataType: 'json',
      data: data,
      url: site_url + '/request/order_data_callback/',
      beforeSend: function() {
        
      },
      success: function(response) {
          $("#order-content").html(response.form);
          $("#order-buttons").html(response.buttons);
          //$('#select-form-clients').selectpicker();
          $('#deliverydate').datetimepicker({
              format: 'YYYY-MM-DD'
          });
      },
      complete: function() {
        
      }
    });
    
    return false;

  }


  function load_items(){

        itemstable = jQuery('#items-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": site_url+'/request/load_items_callback',
          "type": 'post',
          data: function ( d ) {
            d.action = "get_booking_data";
            d.clientids = jQuery('select#select-clients').val();
          },

          "dataSrc": function (json) {
                    console.log(json);
                   json.recordsFiltered = json.recordsFiltered;
                   json.recordsTotal = json.recordsTotal;
                   return json.data;
               },

        },

        "initComplete": function(settings, json) {
                jQuery(".paginate_button > a").on("focus", function(){
                    jQuery(this).blur();
                });
            },

        "columns": [
                  { "data": 'item_code' },
                  { "data": 'item_description' },
                  { "data": 'qty_stock' },
                  { "data": 'qty_reserve' },
                  { "data": 'qty_available' }
                ],
       "order": [[1, "desc"]],
        "aoColumnDefs": [
          // { 
          //   'bSortable': false, 'aTargets': [0, 1, 4] 
          // },
          // {
          //       "targets": [ 1 ],
          //       "visible": false
          // },
          // { 
          //   "searchable": false, "targets": 3
          // }
        ],
        "dom": 'Bfrtip',
        "bFilter": false,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                   columns: [ 1, 3, 4 ]
                    //columns: [ 1, 3, 4,5,6,7,8,9 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                   columns: [ 1, 3, 4]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                   columns: [ 1, 3, 4 ]
                }
            },
            "colvis",
            "pageLength"
        ]

        
      });
  }


  function load_orders(){

        orderstable = jQuery('#order-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": site_url+'/request/load_orders_callback',
          "type": 'post',
          data: function ( d ) {
            d.startdate = jQuery('#start-date').val();
            d.enddate = jQuery('#end-date').val();
            d.clientids = jQuery('select#select-clients').val();
          },

          "dataSrc": function (json) {
                    console.log(json);
                   json.recordsFiltered = json.recordsFiltered;
                   json.recordsTotal = json.recordsTotal;
                   return json.data;
               },

        },

        "initComplete": function(settings, json) {
                jQuery(".paginate_button > a").on("focus", function(){
                    jQuery(this).blur();
                });
            },

        "columns": [
                  { "data": 'client' },
                  { "data": 'delivery' },
                  { "data": 'c_name' },
                  { "data": 'c_address' },
                  { "data": 'zip' },
                  { "data": 'items' },
                  { "data": 'action' }
                ],
       "order": [[1, "desc"]],
        "aoColumnDefs": [
          // { 
          //   'bSortable': false, 'aTargets': [0, 1, 4] 
          // },
          // {
          //       "targets": [ 1 ],
          //       "visible": false
          // },
          // { 
          //   "searchable": false, "targets": 3
          // }
        ],
        "dom": 'Bfrtip',
        "bFilter": false,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                   columns: [ 1, 3, 4 ]
                    //columns: [ 1, 3, 4,5,6,7,8,9 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                   columns: [ 1, 3, 4]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                   columns: [ 1, 3, 4 ]
                }
            },
            "colvis",
            "pageLength"
        ]

        
      });
  }
