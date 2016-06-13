    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <script type="text/javascript">
        var path = window.location.pathname;
        var page = path.split("/").pop();
        console.log( page );

        $("a[href*='" + page + "']").parent().addClass("active");
        console.log(window.location.href);

        var url = window.location.href;
        url = url.substring(0, url.lastIndexOf("/") + 1);
        alert(url);
    </script>

</body>

</html>