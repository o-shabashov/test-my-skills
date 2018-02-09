<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Skill]].
 *
 * @see Skill
 */
class SkillQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/


    public function byName($query) {
        return $this->where(['like', 'LOWER(name)', $query]);
    }

    /**
     * @inheritdoc
     * @return Skill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Skill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
