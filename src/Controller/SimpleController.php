<?php
declare(strict_types=1);
namespace OliverHader\Sast2023Demo\Controller;

final class SimpleController
{
    public function __construct(private readonly \PDO $pdo) {}

    public function showAction(): void
    {
        $id = $_POST['id'] ?? $_GET['id'] ?? null;
        $statement = $this->pdo->query(
            'SELECT title FROM content WHERE id=' . $id
        );
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        $content = sprintf(
            '<h2>%s</h2><p>%s</p>',
                $row['title'] ?? 'no item found',
                $row['content'] ?? ''
        );
        $content .= '<!-- queried item with ID ' . $id . '-->';
        header('Content-Type: text/html');
        header('X-App-Id: ' . $id);
        echo $content;
    }
}
