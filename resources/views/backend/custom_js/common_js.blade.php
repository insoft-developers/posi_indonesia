<script>
    function loading(iselector) {
        $(iselector).text("Processing....");
        $(iselector).attr("disabled", true);
    }

    function unloading(iselector) {
        $(iselector).text("Simpan");
        $(iselector).removeAttr("disabled");
    }

    function explode(data) {
        var myarr = data.split(",");
        return myarr;
    }
</script>