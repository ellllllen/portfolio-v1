<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CVTest extends TestCase
{
    use DatabaseTransactions;

    public function testPageLoads()
    {
        $response = $this->get('/cv');

        $response->assertStatus(200);
    }

    public function testBreadcrumb()
    {
        $response = $this->get('/cv');

        $response->assertStatus(200)
            ->assertSeeTextInOrder(['Home', 'Curriculum Vitae']);
    }

    public function testCanSeeCVTitles()
    {
        $response = $this->get('/cv');

        $response->assertStatus(200)
            ->assertSeeTextInOrder([
            trans('cv.content.personal-statement.title'),
            trans('cv.content.specialist-skills.title'),
            trans('cv.content.employment.title'),
            trans('cv.content.education.title'),
            trans('cv.content.references.title'),
        ]);
    }

    public function testCanSeePersonalStatement()
    {
        $response = $this->get('/cv');

        $content = $this->getPersonalStatementContent();

        $response->assertStatus(200)
            ->assertSeeTextInOrder($content);
    }

    public function testCanSeeSpecialistSkills()
    {
        $response = $this->get('/cv');

        $content = $this->getSpecialistSkillsContent();

        $response->assertStatus(200)
            ->assertSeeTextInOrder($content);
    }

    public function testCanSeeEmployment()
    {
        $response = $this->get('/cv');

        $content = $this->getEmploymentContent();

        $response->assertStatus(200)
            ->assertSeeTextInOrder($content);
    }

    public function testCanSeeEducation()
    {
        $response = $this->get('/cv');

        $content = $this->getEducationContent();

        $response->assertStatus(200)
            ->assertSeeTextInOrder($content);
    }

    public function testCanSeeReferences()
    {
        $response = $this->get('/cv');

        $content = $this->getReferencesContent();

        $response->assertStatus(200)
            ->assertSeeTextInOrder($content);
    }

    public function testCanSeeAllSections()
    {
        $response = $this->get('/cv');

        $content = array_merge(
            $this->getPersonalStatementContent(),
            $this->getSpecialistSkillsContent(),
            $this->getEmploymentContent(),
            $this->getEducationContent(),
            $this->getReferencesContent()
        );

        $response->assertStatus(200)
            ->assertSeeTextInOrder($content);
    }

    /**
     * @return array
     */
    private function getPersonalStatementContent(): array
    {
        return array_merge([trans('cv.content.personal-statement.title')], trans('cv.content.personal-statement.content'));
    }

    /**
     * @return array
     */
    private function getSpecialistSkillsContent(): array
    {
        return array_merge([trans('cv.content.specialist-skills.title')], trans('cv.content.specialist-skills.content'));
    }

    /**
     * Not sure this is the best way to do this - need to flatten all strings into a one dimensional array
     * @return array
     */
    private function getEmploymentContent()
    {
        $content = [trans('cv.content.employment.title')];
        foreach (trans('cv.content.employment.content') as $employment) {
            $content[] = $employment['name'];
            $content[] = $employment['location'];
            foreach ($employment['roles'] as $role) {
                $content[] = $role['title'];
                $content[] = $role['date'];
            }
            foreach ($employment['content'] as $item) {
                $content[] = $item;
            }
        }

        return $content;
    }

    /**
     * Not sure this is the best way to do this - need to flatten all strings into a one dimensional array
     * @return array
     */
    private function getEducationContent(): array
    {
        $content = [trans('cv.content.education.title')];
        foreach (trans('cv.content.education.content') as $education) {
            $content[] = $education['name'];
            $content[] = $education['location'];
            foreach ($education['qualifications'] as $qualification) {
                $content[] = $qualification['name'];

                foreach ($qualification['content'] as $item) {
                    $content[] = $item;
                }
            }
        }

        return $content;
    }

    /**
     * @return array
     */
    private function getReferencesContent(): array
    {
        return array_merge([trans('cv.content.references.title')], trans('cv.content.references.content'));
    }
}