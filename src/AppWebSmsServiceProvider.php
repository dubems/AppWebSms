<?php


use Illuminate\Support\ServiceProvider;
use AppWebSms\AppWebSms as AppWebSmsClient;
use AppWebSms\Exceptions\InvalidConfiguration;

class AppWebSmsServiceProvider extends ServiceProvider
{
    
    
    public function boot()
    {
        $this->app->singleton(AppWebSmsClient::class,function(){
            
            $config = config('services.appwebsms');
            
            if(is_null($config) || empty($config['username']) || empty($config['password']) || empty(['sender']))
            {
                throw InvalidConfiguration::configNotFound();
            }
            
            return new AppWebSmsClient(
                $config['username'],
                $config['password'],
                $config['sender']
            );
            
        });
    }
}