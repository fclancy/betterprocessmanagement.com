<?php

namespace App\Filament\Resources;

use App\Models\GalleryItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Gallery';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation !== 'create') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->helperText('URL-friendly identifier (auto-generated from title)'),
                Forms\Components\MarkdownEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('client')
                    ->maxLength(255)
                    ->helperText('Client name for this project (optional)'),
                Forms\Components\TextInput::make('project_url')
                    ->url()
                    ->maxLength(500)
                    ->helperText('External link to project or case study (optional)'),
                Forms\Components\Select::make('category')
                    ->options([
                        'process-management' => 'Process Management',
                        'cost-optimization' => 'Cost Optimization',
                        'it-strategy' => 'IT Strategy',
                        'training' => 'Training',
                        'blue-ocean' => 'Blue Ocean',
                        'case-study' => 'Case Study',
                        'other' => 'Other',
                    ])
                    ->maxLength(100),
                Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('gallery')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Main gallery image (required)'),
                Forms\Components\FileUpload::make('additional_images')
                    ->multiple()
                    ->image()
                    ->disk('public')
                    ->directory('gallery/additional')
                    ->columnSpanFull()
                    ->helperText('Additional images for this project (optional)'),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured')
                    ->helperText('Show on homepage featured section'),
                Forms\Components\Toggle::make('is_published')
                    ->label('Published')
                    ->default(false)
                    ->helperText('Publicly visible in gallery'),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Sort order (lower numbers first)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->disk('public')
                    ->square()
                    ->size(50),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'process-management' => 'info',
                        'cost-optimization' => 'success',
                        'it-strategy' => 'warning',
                        'blue-ocean' => 'primary',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published')
                    ->placeholder('All')
                    ->true('Yes')
                    ->false('No'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured')
                    ->placeholder('All')
                    ->true('Yes')
                    ->false('No'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
}
