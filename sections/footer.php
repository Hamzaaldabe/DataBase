</div>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script>
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;

    document.getElementById("form1Example1").value = today;
    document.getElementById("form2Example2").value = today;

</script>
</body>
</html>