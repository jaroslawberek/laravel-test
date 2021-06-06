 //------ Route for Players ------
   Route::get('/players/destroy/{id}', 'Players@destroy')->name('destroy-player');
                        Route::get('/players/ajaxField ','players@ajaxField')->name('ajaxField');
                    
Route::resource('players', players::class);
