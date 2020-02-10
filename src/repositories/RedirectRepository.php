<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Redirect\repositories;

use DmitriiKoziuk\yii2Base\repositories\AbstractActiveRecordRepository;
use DmitriiKoziuk\yii2Redirect\entities\RedirectEntity;

class RedirectRepository extends AbstractActiveRecordRepository
{
    public function findByHash(string $urlHash): ?RedirectEntity
    {
        /** @var RedirectEntity|null $entity */
        $entity = RedirectEntity::find()->where(['from_url_hash' => $urlHash])->one();
        return $entity;
    }
}