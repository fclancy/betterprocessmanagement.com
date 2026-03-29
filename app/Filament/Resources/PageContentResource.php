<?php

namespace App\Filament\Resources;

use App\Models\PageContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Page Content';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('page_key')
                    ->options([
                        'about_us' => 'About Us',
                        'services' => 'Services',
                        'contact' => 'Contact Page',
                        'faq' => 'FAQ',
                        'privacy' => 'Privacy Policy',
                        'terms' => 'Terms of Service',
                        'blue_ocean' => 'Blue Ocean Review',
                    ])
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->disabledOn('edit')
                    ->helperText('Select the page this content belongs to.'),
                Forms\Components\TextInput::make('meta_title')
                    ->maxLength(255)
                    ->label('Meta Title (SEO)')
                    ->helperText('Optional. Override default page title for search engines.'),
                Forms\Components\Textarea::make('meta_description')
                    ->maxLength(500)
                    ->label('Meta Description (SEO)')
                    ->rows(2)
                    ->helperText('Optional. Short description for search engine results.'),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_key')
                    ->label('Page')
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state)))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('page_key', 'asc');
    }
}
