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
</body>

</html>