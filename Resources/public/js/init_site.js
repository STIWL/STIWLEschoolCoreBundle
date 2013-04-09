$(function() {
    var activo = 1;
    function doLoading($this) {
        activo = 1;
        $loading = $("<div class='loading'></div>").css("display", "inline-block");
        $.ajaxSetup({
            beforeSend: function() {
                if (activo == 1) {
                    $this.attr("disabled", true);
                    $this.after($loading);
                }
            },
            complete: function() {
                $this.attr("disabled", false);
                $("div.loading").remove();
                activo = 0;
            }
        });
    }

    $("form input[type='submit']").on("click", function(event) {
        doLoading($(event.target));
    });

    $("select").on("change", function(event) {
        doLoading($(event.target));
    });
});