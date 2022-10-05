<?php

require('./db.php');


// ToDoリストの取得
function getTodoList($dbh) {
    $query = 'SELECT * FROM todo;';
    return $dbh->query($query);
}


// deleteされたら
if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    print_r("delete");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>状態</th>
                <th>作成日時</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                // タスク一覧取得
                $todo = getTodoList($dbh);

                foreach($todo as $task) {
            ?>
                <tr>
                    <td><?php echo $task['id']; ?></td>
                    <td><?php echo $task['title']; ?></td>
                    <td><?php echo $task['is_end'] ? '完了' : '未完了'; ?></td>
                    <td><?php echo (new DateTime($task['created_at']))->format('Y年m月d日 H時i分s秒'); ?></td>
                    <td>
                        <?
                            if ($task['is_end'] == 0) {
                        ?>
                                <form method="post" action="update.php">
                                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="submit" value="終了">
                                </form>
                        <?php
                            }
                        ?>
                        <form method="post" action="update.php">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

    <form method="post" action="post.php">
        <span for="title">タスクタイトル：
            <input type="text" name="title" id="title" required>
        </span>

        <input type="submit" value="登録">
    </form>

</body>
</html>
