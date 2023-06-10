<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上二手書店</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        color: white;
    }
    
    #searchInput {
        background: rgba(255, 255, 255, 0.3);
        flex: 1;
        border: 0;
        outline: none;
        font-size: 18px;
        color: #cac7ff;
        border-radius: 5px;
        margin: 5px;
        padding: 5px;
    }
    
    ion-icon:hover {
        color: orangered;
    }
    
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 18px;
    }
    
    th,
    td {
        text-align: left;
        padding: 8px;
        text-align: center;
    }
    
    th {
        cursor: pointer;
        font-family: 'Times New Roman', Times, serif;
    }
    
    tbody tr:nth-child(2n-1) {
        background: rgba(255, 255, 255, 0.2);
    }
</style>


<body>
    <h1>訂單管理</h1>
    <input type="text" id="searchInput" placeholder="搜尋...">
    <table id="orderTable">
        <thead>
            <tr>
                <th onclick="sortTable(0)">訂單編號
                    <ion-icon name="caret-down-outline"></ion-icon>
                </th>
                <th onclick="sortTable(1)">貨品名稱</th>
                <th onclick="sortTable(2)">日期
                    <ion-icon name="caret-down-outline"></ion-icon>
                </th>
                <th onclick="sortTable(3)">金額
                    <ion-icon name="caret-down-outline"></ion-icon>
                </th>
                <th onclick="sortTable(4)">出貨狀態
                <ion-icon name="caret-down-outline"></ion-icon>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>001</td>
                <td>book1</td>
                <td>2023-05-01</td>
                <td>$100</td>
                <td>已出貨</td>
            </tr>
        </tbody>
    </table>

    <script>
        function sortTable(column) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("orderTable");
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[column];
                    y = rows[i + 1].getElementsByTagName("td")[column];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }

        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("orderTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }


        var sortOrder = {
            0: 'asc',
            1: 'asc',
            2: 'asc',
            3: 'asc'
        };

        function sortTable(column) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("orderTable");
            switching = true;

            var sortDirection = sortOrder[column] === 'asc' ? 'desc' : 'asc';
            sortOrder[column] = sortDirection;

            while (switching) {
                switching = false;
                rows = table.tBodies[0].rows;
                for (i = 0; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[column];
                    y = rows[i + 1].getElementsByTagName("td")[column];

                    var xValue, yValue;

                    if (column === 0 || column === 3) {
                        xValue = x.innerHTML.toLowerCase();
                        yValue = y.innerHTML.toLowerCase();
                    } else if (column === 2) {
                        xValue = new Date(x.innerHTML);
                        yValue = new Date(y.innerHTML);
                    } else if (column === 1) {
                        xValue = rows[i].getElementsByTagName("td")[3].innerHTML;
                        yValue = rows[i + 1].getElementsByTagName("td")[3].innerHTML;
                    }

                    if (sortDirection === 'asc') {
                        if (xValue > yValue) {
                            shouldSwitch = true;
                            break;
                        }
                    } else {
                        if (xValue < yValue) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }

        document.getElementById("searchInput").addEventListener("keyup", function() {
            var input, filter, table, tbody, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("orderTable");
            tbody = table.tBodies[0];
            tr = tbody.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                var found = false;
                for (var j = 0; j < td.length; j++) {
                    var cell = td[j];
                    if (cell) {
                        txtValue = cell.textContent || cell.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>