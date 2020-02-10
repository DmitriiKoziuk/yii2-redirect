<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Redirect\components;

use yii\base\BaseObject;
use yii\web\UrlManager;
use yii\web\UrlRuleInterface;
use DmitriiKoziuk\yii2Redirect\RedirectModule;
use DmitriiKoziuk\yii2Redirect\repositories\RedirectRepository;

final class UrlRule extends BaseObject implements UrlRuleInterface
{
    /**
     * @var RedirectRepository
     */
    private $repository;

    public function __construct(
        RedirectRepository $repository,
        array $config = []
    ) {
        parent::__construct($config);
        $this->repository = $repository;
    }

    public function parseRequest($manager, $request)
    {
        $redirectEntity = $this->repository->findByHash(md5($request->getUrl()));
        if (! empty($redirectEntity)) {
            return [
                RedirectModule::ID . '/redirect/redirect',
                [
                    'redirectEntity' => $redirectEntity,
                ]
            ];
        }
        return false;
    }

    /**
     * Creates a URL according to the given route and parameters.
     * @param UrlManager $manager the URL manager
     * @param string $route the route. It should not have slashes at the beginning or the end.
     * @param array $params the parameters
     * @return string|bool the created URL, or false if this rule cannot be used for creating this URL.
     */
    public function createUrl($manager, $route, $params)
    {
        return false;
    }
}