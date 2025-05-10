<!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->

<script src="{{ URL::to('admin/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


<script src="{{ URL::to('admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="{{ URL::to('admin/assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ URL::to('admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/bower_components/morris.js/morris.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{ URL::to('admin/assets/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/bower_components/moment/min/moment.min.js')}}"></script>


<script src="{{ URL::to('admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ URL::to('admin/assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{ URL::to('admin/assets/dist/js/adminlte.min.js')}}"></script>
<!-- <script src="{{ URL::to('admin/assets/dist/js/pages/dashboard.js')}}"></script> -->
<script src="{{ URL::to('admin/assets/dist/js/demo.js')}}"></script>

<!-- Start :: Print Code JS -->
<script src="https://nidhiexpert.com/Content/js/printthis.js"></script>

<script>
    $(document).ready(function () {
        $(".print-page").click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            print_page();
        });

        function print_page(argument) {
            $("#printDiv").printThis({
                debug: false,
                importCSS: false,
                importStyle: false,
                printContainer: false,
                pageTitle: "",
                removeInline: false,
                printDelay: 333,
                header: null,
                footer: null,                
                formValues: true                
            });
        };
    });

    $(document).ready(function () {
        var r = $('#printDiv').html();
        $("#wholehtml").val(r);
    })
</script>

<!-- End :: Print Code JS -->

<script>
  $(function () {
    $('#dataTables_table_init').DataTable();
    $('.selectpicker').select2();
    $('.select2-container').css('width','100%');
  })

  function selectPickerInitialize(Selecter) {
    $('#'+Selecter).select2();
    $('.select2-container').css('width','100%');
  }

  function selectPickerInitialize_class(selectpicker) {
    $('.'+selectpicker).select2();
    $('.select2-container').css('width','100%');
  }

  

  function success_notification(message) {
     Toastify({
          text: message,
          duration: 3000,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          style: {
            background: "#00a65a",
          }
        }).showToast();
  }
  function error_notification(message) {
     Toastify({
          text: message,
          duration: 3000,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          style: {
            background: "#dd4b39",
          }
        }).showToast();
  }

  function readURLImage(input,img_preview) 
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#'+img_preview).removeClass('hide');
            $('#'+img_preview).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
</script>