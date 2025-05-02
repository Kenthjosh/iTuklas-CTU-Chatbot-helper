<?php

namespace App\Models;

use App\Status;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time',
        'end_time',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'start_time' => 'datetime',
            'end_time' => 'datetime',
            'status' => Status::class,
        ];
    }

    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }

    public static function getForm(): array
    {
        return [
            DateTimePicker::make('start_time')
                ->required()
                ->label('Start Time'),
            DateTimePicker::make('end_time')
                ->required()
                ->label('End Time'),
            Select::make('status')
                ->options(Status::class)
                ->required()
                ->label('Status'),
        ];
    }
}