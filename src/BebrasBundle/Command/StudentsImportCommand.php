<?php

namespace BebrasBundle\Command;

use BebrasBundle\Entity\Saver\StudentSaver;
use BebrasBundle\Reader\XlsxStudentReader;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Tadas Gliaubicas
 */
class StudentsImportCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('bebras:import:students')
            ->setDescription('Import students from file.')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Full file path.')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $students = $this->getReader()->read($filePath);

        $this->getSaver()->saveAll($students);

        $output->writeln(sprintf('Created %s students.', count($students)));
    }

    /**
     * @return XlsxStudentReader
     */
    private function getReader()
    {
        return $this->getContainer()->get('bebras.reader.xlsx_student');
    }

    /**
     * @return StudentSaver
     */
    private function getSaver()
    {
        return $this->getContainer()->get('bebras.saver.student');
    }
}
