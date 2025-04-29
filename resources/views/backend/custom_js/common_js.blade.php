<script>
    function loading(iselector) {
        $(iselector).text("Processing....");
        $(iselector).attr("disabled", true);
    }

    function unloading(iselector) {
        $(iselector).text("Simpan");
        $(iselector).removeAttr("disabled");
    }

    function unloading2(iselector) {
        $(iselector).text("Bulk Approve");
        $(iselector).removeAttr("disabled");
    }

    function unloading3(iselector, text) {
        $(iselector).text(text);
        $(iselector).removeAttr("disabled");
    }

    function explode(data) {
        var myarr = data.split(",");
        return myarr;
    }
</script>