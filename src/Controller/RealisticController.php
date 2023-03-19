<?php
declare(strict_types=1);
namespace OliverHader\Sast2023Demo\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class RealisticController
{
    public function __construct(
        private readonly Environment $twig,
        private readonly Connection $connection
    ) {}

    public function showAction(Request $request): Response
    {
        $id = $request->request->get('id') ?? $request->query->get('id');
        $queryBuilder = $this->connection->createQueryBuilder();
        $result = $queryBuilder
            ->select('*')
            ->from('content')
            ->where($queryBuilder->expr()->eq('id', $id))
            ->executeQuery();
        $item = $result->fetchAssociative();
        $content = $this->twig->render('show.html', ['item' => $item]);
        $content .= '<!-- queried item with ID ' . $id . '-->';
        $headers = ['Content-Type' => 'text/html', 'X-App-Id' => $id];
        return new Response($content, Response::HTTP_OK, $headers);
    }
}
