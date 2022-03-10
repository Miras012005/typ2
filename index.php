<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="#" method="post">
        <div class="select">
            <label>Wybierz opcję wyświetlania: </label>
            <select name="option_show">
                <option value="list">Lista</option>
                <option value="table">Tabela</option>
                <option value="cards">Karty</option>
            </select>
        </div>
        <div class="input">
            <label>Ile wierszy wyświetlić: </label>
            <input type="number" name="records" min="0">
        </div>
        <div class="btn">
            <button type="submit">Wyświetl</button>
        </div>
    </form>
    <div class="show">
        <?php
        if (isset($_POST['option_show']) && !empty($_POST['records'])) {
            $option_show = $_POST['option_show'];
            $records = $_POST['records'];
            $conn = mysqli_connect('localhost', 'root', '', 'dane1');

            $q = "select imie, nazwisko, rok_urodzenia from osoby";
            $result = mysqli_query($conn, $q);
            $max_records = mysqli_num_rows($result);

            $q = "select imie, nazwisko, rok_urodzenia from osoby limit $records";
            $result = mysqli_query($conn, $q);
            $current_records = mysqli_num_rows($result);

            echo "<h4>Wyświetlono $current_records z $max_records rekordów</h4>";
            echo "<div class='show_data'>";
            switch ($option_show) {
                case 'list':
                    echo "<ol>";
                    while ($row = mysqli_fetch_array($result)) {
                        $age = date('Y') - $row[2];
                        echo "<li>Imię: {$row[0]}, Nazwisko: {$row[1]}, Wiek: $age</li>";
                    }
                    echo "</ol>";
                    break;
                case 'table':
                    $lp = 1;
                    echo "<table>
                            <tr>
                                <th>Lp.</th>
                                <th>Imię</th>
                                <th>Nazwisko</th>
                                <th>Wiek</th>
                            </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        $age = date('Y') - $row[2];
                        echo "<tr>
                            <td>{$lp}.</td>
                            <td>{$row[0]}</td>
                            <td>{$row[1]}</td>
                            <td>{$age}</td>
                        </tr>";
                        $lp++;
                    };
                    echo "</table>";
                    break;
                case 'cards':
                    while ($row = mysqli_fetch_array($result)) {
                        $age = date('Y') - $row[2];
                        echo "<div><h3>Imię i nazwisko:<br> {$row[0]} {$row[1]}</h3> Wiek: {$age}</div>";
                    }
                    break;
            }
            echo "</div>";
        } else {
            echo "<h4>Brak rekordów do wyświetlenia!</h4>";
        }

        ?>
    </div>
</body>

</html>