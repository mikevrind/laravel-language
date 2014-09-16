<?php namespace MikeVrind\LaravelLanguage\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputOption;
use MikeVrind\LaravelLanguage\LanguageDoubles;

class DoublesCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'language:doubles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search for any duplications in the translationa';

    /**
     * @var
     */
    protected $scanner;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire() {

        $scanTranslations   = new LanguageDoubles($this->option('language'));
        $resultDoubles      = $scanTranslations->getDoubles();
        $resultUniques      = $scanTranslations->getUniques();

        if ( $resultDoubles == 0 )
        {
            $this->info(' ' . $this->option('language') . ' did not contained any duplicate translations.');
        }
        else
        {
            $i = 1;

            foreach ( $resultDoubles as $doubleKey => $doubleValue )
            {

                $indentSize = '';

                for ( $s = 0; $s < (strlen('  ['.$i.']  '))-3; $s++)
                {
                    $indentSize .= ' ';
                }

                $this->info(' ['.$i.'] '.$resultUniques[$doubleKey]);
                $this->info($indentSize.' First occurrence in: ' . $resultUniques[$doubleKey]);
                $this->info($indentSize.' Other occurrences in: ');

                foreach ( $doubleValue as $doubleLocation )
                {
                    $this->comment($indentSize.'  + ' . $doubleLocation);
                }

                $this->info('');

                $i++;

            }
        }

    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return [
            ['language', null, InputOption::VALUE_OPTIONAL, 'Define which language you would like to scan', Config::get('app.locale')],
        ];
    }
}