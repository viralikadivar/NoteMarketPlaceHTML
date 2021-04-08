$('#showModel').click(function() {

    $("#exampleModalScrollable").one("hidden.bs.modal", function () {
        $('button[name="downloadTheBook"]').trigger('click');
    });

});