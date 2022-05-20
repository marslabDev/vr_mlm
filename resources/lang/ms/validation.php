<?php

return [
    'accepted'         => ':attribute mesti diterima.',
    'active_url'       => ':attribute bukan URL yang sah.',
    'after'            => ':attribute mestilah tarikh selepas  :date.',
    'after_or_equal'   => ':attribute hanya boleh mengandungi huruf. mestilah tarikh selepas atau sama dengan :date.',
    'alpha'            => ':attribute hanya boleh mengandungi huruf.',
    'alpha_dash'       => ':attribute hanya boleh mengandungi huruf, nombor dan sempang.',
    'alpha_num'        => ':attribute hanya boleh mengandungi huruf dan nombor.',
    'latin'            => ':attribute hanya boleh mengandungi huruf abjad Latin ISO.',
    'latin_dash_space' => ':attribute hanya boleh mengandungi huruf abjad Latin ISO, nombor, sempang, sempang dan ruang.',
    'array'            => ':attribute mestilah array.',
    'before'           => ':attribute mestilah tarikh sebelum :date.',
    'before_or_equal'  => ':attribute mestilah tarikh sebelum atau sama dengan :date.',
    'between'          => [
        'numeric' => ':attribute mestilah antara :min dan :max.',
        'file'    => ':attribute mestilah antara :min dan :max kilobait.',
        'string'  => ':attribute mestilah antara :min dan :max aksara.',
        'array'   => ':attribute mesti mempunyai antara item :min dan :max.',
    ],
    'boolean'          => 'Medan :attribute mestilah benar atau salah.',
    'confirmed'        => 'Pengesahan :attribute tidak sepadan.',
    'current_password' => 'The password is incorrect.',
    'date'             => ':attribute bukan tarikh yang sah.',
    'date_equals'      => ':attribute mestilah tarikh bersamaan dengan :date.',
    'date_format'      => ':attribute tidak sepadan dengan format :format.',
    'different'        => ':attribute dan :other mestilah berbeza.',
    'digits'           => ':attribute mestilah :digits digit.',
    'digits_between'   => ':attribute mestilah antara :min dan :max digit.',
    'dimensions'       => ':attribute mempunyai dimensi imej yang tidak sah.',
    'distinct'         => 'Medan :attribute mempunyai nilai pendua.',
    'email'            => ':attribute mestilah alamat e-mel yang sah.',
    'ends_with'        => ':attribute mesti berakhir dengan salah satu daripada yang berikut: :values.',
    'exists'           => ':attribute yang dipilih tidak sah.',
    'file'             => ':attribute mestilah fail.',
    'filled'           => 'Medan :attribute mesti mempunyai nilai.',
    'gt'               => [
        'numeric' => ':attribute mestilah lebih besar daripada :value.',
        'file'    => ':attribute mestilah lebih besar daripada :value kilobait.',
        'string'  => ':attribute mestilah lebih besar daripada :value aksara.',
        'array'   => ':attribute mesti mempunyai lebih daripada :item item.',
    ],
    'gte' => [
        'numeric' => ':attribute mestilah lebih besar daripada atau sama dengan :value.',
        'file'    => ':attribute mestilah lebih besar daripada atau sama dengan :value kilobait.',
        'string'  => ':attribute mestilah lebih besar daripada atau sama dengan :value aksara.',
        'array'   => ':attribute mesti mempunyai :value item atau lebih.',
    ],
    'image'    => ':attribute mestilah imej.',
    'in'       => ':attribute yang dipilih tidak sah.',
    'in_array' => 'Medan :attribute tidak wujud dalam :other.',
    'integer'  => ':attribute mestilah integer.',
    'ip'       => ':attribute mestilah alamat IP yang sah.',
    'ipv4'     => ':attribute mestilah alamat IPv4 yang sah.',
    'ipv6'     => ':attribute mestilah alamat IPv6 yang sah.',
    'json'     => ':attribute mestilah rentetan JSON yang sah.',
    'lt'       => [
        'numeric' => ':attribute mestilah kurang daripada :value.',
        'file'    => ':attribute mestilah kurang daripada :value kilobait.',
        'string'  => ':attribute mestilah kurang daripada :value aksara.',
        'array'   => ':attribute mesti mempunyai kurang daripada :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute mestilah kurang daripada atau sama dengan :value.',
        'file'    => ':attribute mestilah kurang daripada atau sama dengan :value kilobait.',
        'string'  => ':attribute mestilah kurang daripada atau sama dengan :value aksara.',
        'array'   => ':attribute tidak boleh mempunyai lebih daripada :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih besar daripada :max.',
        'file'    => ':attribute tidak boleh lebih besar daripada :max kilobait.',
        'string'  => ':attribute tidak boleh lebih besar daripada :max aksara.',
        'array'   => ':attribute mungkin tidak mempunyai lebih daripada :max item.',
    ],
    'mimes'     => ':attribute mestilah fail jenis: :values.',
    'mimetypes' => ':attribute mestilah fail jenis: :values.',
    'min'       => [
        'numeric' => ':attribute mestilah sekurang-kurangnya :min.',
        'file'    => ':attribute mestilah sekurang-kurangnya :min kilobait.',
        'string'  => ':attribute mestilah sekurang-kurangnya :min aksara.',
        'array'   => ':attribute mesti mempunyai sekurang-kurangnya :min item.',
    ],
    'not_in'               => ':attribute yang dipilih tidak sah.',
    'not_regex'            => 'Format :attribute tidak sah.',
    'numeric'              => ':attribute mestilah nombor.',
    'password'             => 'Kata laluan tidak betul.',
    'present'              => 'Medan :attribute mesti tersedia.',
    'regex'                => 'Format :attribute tidak sah.',
    'required'             => 'Medan :attribute diperlukan.',
    'required_if'          => 'Medan :attribute diperlukan apabila :other ialah :value.',
    'required_unless'      => 'Medan :attribute diperlukan melainkan :other berada dalam :values.',
    'required_with'        => 'Medan :attribute diperlukan apabila :values tersedia.',
    'required_with_all'    => 'Medan :attribute diperlukan apabila :values tersedia.',
    'required_without'     => 'Medan :attribute diperlukan apabila :values tidak tersedia.',
    'required_without_all' => 'Medan :attribute diperlukan apabila tiada satu pun daripada :values tersedia.',
    'same'                 => ':attribute dan :other mesti sepadan.',
    'size'                 => [
        'numeric' => ':attribute mestilah :size.',
        'file'    => ':attribute mestilah :size kilobait.',
        'string'  => ':attribute mestilah :size aksara.',
        'array'   => ':attribute mesti mengandungi :size item.',
    ],
    'starts_with' => ':attribute mesti bermula dengan salah satu daripada berikut: :values.',
    'string'      => ':attribute mestilah rentetan.',
    'timezone'    => ':attribute mestilah zon yang sah.',
    'unique'      => ':attribute telah pun diambil.',
    'uploaded'    => ':attribute gagal dimuat naik.',
    'url'         => 'Format :attribute tidak sah.',
    'uuid'        => ':attribute mestilah UUID yang sah.',
    'custom'      => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'reserved_word'                  => ':attribute mengandungi perkataan terpelihara',
    'dont_allow_first_letter_number' => 'Medan \":input\" tidak boleh mempunyai huruf pertama sebagai nombor',
    'exceeds_maximum_number'         => ':attribute melebihi panjang model maksimum',
    'db_column'                      => ':attribute hanya boleh mengandungi huruf abjad Latin ISO, nombor, sempang dan tidak boleh bermula dengan nombor.',
    'attributes'                     => [],
];