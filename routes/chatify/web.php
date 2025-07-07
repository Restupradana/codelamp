<?php

use Chatify\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

// Main Messenger Route
Route::get('/', [MessagesController::class, 'index'])->name(config('chatify.routes.prefix'));

// Fetch info for specific id [user/group]
Route::post('/idInfo', [MessagesController::class, 'idFetchData']);

// Send message
Route::post('/sendMessage', [MessagesController::class, 'send'])->name('send.message');

// Fetch messages
Route::post('/fetchMessages', [MessagesController::class, 'fetch'])->name('fetch.messages');

// Download attachment
Route::get('/download/{fileName}', [MessagesController::class, 'download'])->name(config('chatify.attachments.download_route_name'));

// Pusher auth
Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('pusher.auth');

// Make seen
Route::post('/makeSeen', [MessagesController::class, 'seen'])->name('messages.seen');

// Get contacts
Route::get('/getContacts', [MessagesController::class, 'getContacts'])->name('contacts.get');

// Update contact
Route::post('/updateContacts', [MessagesController::class, 'updateContactItem'])->name('contacts.update');

// Favorite
Route::post('/star', [MessagesController::class, 'favorite'])->name('star');
Route::post('/favorites', [MessagesController::class, 'getFavorites'])->name('favorites');

// Search
Route::get('/search', [MessagesController::class, 'search'])->name('search');

// Shared
Route::post('/shared', [MessagesController::class, 'sharedPhotos'])->name('shared');

// Delete
Route::post('/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('conversation.delete');
Route::post('/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('message.delete');

// Settings
Route::post('/updateSettings', [MessagesController::class, 'updateSettings'])->name('avatar.update');
Route::post('/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('activeStatus.set');

// Group view
Route::get('/group/{id}', [MessagesController::class, 'index'])->name('group');

// User view
Route::get('/{id}', [MessagesController::class, 'index'])->name('user');
