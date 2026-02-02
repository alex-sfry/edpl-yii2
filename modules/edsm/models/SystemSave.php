<?php

namespace app\edsm\models;

use app\models\System;

class SystemSave extends System
{
    /**
     * @param array $data
     * @return bool
     * @throws \yii\db\Exception
     */
    public function loadAndSave(array $data): bool
    {
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->primary_economy = isset($data['information']['economy']) ? $data['information']['economy'] : null;
        $this->secondary_economy = isset($data['information']['secondEconomy'])
            ? $data['information']['secondEconomy']
            : null;
        $this->government = isset($data['information']['government']) ? $data['information']['government'] : null;
        $this->allegiance = isset($data['information']['allegiance']) ? $data['information']['allegiance'] : null;
        $this->security = isset($data['information']['security']) ? $data['information']['security'] : null;
        $this->population = isset($data['information']['population']) ? $data['information']['population'] : null;

        return $this->save();
    }
}
