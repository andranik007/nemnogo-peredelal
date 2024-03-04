<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vel";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
    exit;
}

$stmt = $db->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<style>
    .dropdown-menu .dropdown-item {
        color: #770000;
    }
    .dropdown-menu .dropdown-item:hover {
        background-color: #f2f2f2;
    }
</style>
</head>

<body>
<div class="container-fluid">
    <h2 class="text-center mt-5">Admin Panel</h2>

    <h2 class="text-center mt-5">Зарегистрированные пользователи</h2>

    <div class="row mt-3">
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    Просмотр
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="admin_panel_users.php">Просмотреть зарегистрированных пользователей</a></li>
                    <li><a class="dropdown-item" href="admin_panel.php">Просмотреть товары</a></li>
                    <li><a class="dropdown-item" href="admin_panel_brends.php">Просмотреть бренды</a></li>
                    <li><a class="dropdown-item" href="admin_panel_category.php">Просмотреть категории</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>login</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Пароль</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['login']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                            <td>
                                    <!-- Кнопка для удаления товара -->
                                    <form method="post" action="delete_user.php">
                                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                    <!-- Кнопка для редактирования товара -->
                                    <a href="edit_product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Редактировать</a>
                                </td>
                        </tr>
                        
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>