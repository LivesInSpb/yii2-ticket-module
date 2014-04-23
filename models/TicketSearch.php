<?php

namespace istt\ticket\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use istt\ticket\models\Ticket;

/**
 * TicketSearch represents the model behind the search form about `istt\ticket\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    public function rules()
    {
        return [
            [['id', 'type', 'priority', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status'], 'integer'],
            [['title', 'customer_fullname', 'customer_company', 'customer_phone', 'customer_email', 'system', 'detail', 'suggestion', 'requested_at', 'replied_at', 'fixed_begin', 'fixed_end', 'cause', 'solution', 'site', 'hardware_type', 'hardware_part', 'hardware_serial'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Ticket::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'priority' => $this->priority,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
//             'requested_at' => $this->requested_at,
//             'replied_at' => $this->replied_at,
//             'fixed_begin' => $this->fixed_begin,
//             'fixed_end' => $this->fixed_end,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'customer_fullname', $this->customer_fullname])
            ->andFilterWhere(['like', 'customer_company', $this->customer_company])
            ->andFilterWhere(['like', 'customer_phone', $this->customer_phone])
            ->andFilterWhere(['like', 'customer_email', $this->customer_email])
            ->andFilterWhere(['like', 'system', $this->system])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'suggestion', $this->suggestion])
            ->andFilterWhere(['like', 'cause', $this->cause])
            ->andFilterWhere(['like', 'solution', $this->solution])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'hardware_type', $this->hardware_type])
            ->andFilterWhere(['like', 'hardware_part', $this->hardware_part])
            ->andFilterWhere(['like', 'hardware_serial', $this->hardware_serial]);

        return $dataProvider;
    }
}
