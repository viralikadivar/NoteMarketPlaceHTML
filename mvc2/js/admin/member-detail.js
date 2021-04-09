
        $(window).on('load', function () { // makes sure that whole site is loaded
            $('#status').fadeOut();
            $('#preloader').fadeOut('fast');
        });


        var table = $(".dashboard-table").DataTable({
            "dom": '<"top">t<"bottom"p><"clear">',
            "pagingType": "simple_numbers",
            "pageLength": "5",
            "lengthChange": "5",
            "language": {
                "zeroRecords": "No Record Found"
            },
            "aoColumnDefs": [
                { "bSortable": true, "aTargets": ["_all"] } //disable ordering events and takeout the icon
            ]
        });

        $(function () {

            // for pagination 
            $("#DataTables_Table_0_previous").html('&#12296;');
            $("#DataTables_Table_0_next").html('&#12297;');

            $(document).on('draw.dt', function () {
                $("#DataTables_Table_0_previous").html('&#12296;');
                $("#DataTables_Table_0_next").html('&#12297;');
            });
        });

        $(function () {
            $("button[name='download']").click(function () {
              let noteID = $(this)
                .parents(".table-row")
                .children(".noteID")
                .attr("value");
              $("input[name='noteID']").val(noteID);
            });
            $(".noteTitle").click(function () {
              let noteID = $(this)
                .parents(".table-row")
                .children(".noteID")
                .attr("value");
              $("input[name='noteID']").val(noteID);
              $("button[name='noteDetail']").trigger("click");
            });
          
            $(".noOfDownloads").click(function () {
              let noteID = $(this)
                .parents(".table-row")
                .children(".noteID")
                .attr("value");
              $("input[name='noteID']").val(noteID);
              $("button[name='getNoOfDownloads']").trigger("click");
            });
        
          });