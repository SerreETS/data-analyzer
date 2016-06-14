
    <script type="text/javascript">
        var path = window.location.pathname;
        var page = path.split("/").pop();
        console.log( page );

        $("a[href*='" + page + "']").parent().addClass("active");
        console.log(window.location.href);

        var url = window.location.href;
        url = url.substring(0, url.lastIndexOf("/") + 1);
        console.log(url);
    </script>

</body>

</html>