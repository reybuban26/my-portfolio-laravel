<?php

namespace Tests\Feature;

use Tests\TestCase;

class CvTest extends TestCase
{
    public function test_cv_page_is_accessible(): void
    {
        $response = $this->get('/cv');
        $response->assertStatus(200);
        $response->assertSee('Rey Buban');
        $response->assertSee('Curriculum Vitae');
    }

    public function test_download_cv_returns_pdf(): void
    {
        $response = $this->get('/download-cv');
        $response->assertStatus(200);
        $this->assertEquals('application/pdf', $response->headers->get('content-type'));
        $this->assertStringContainsString('Rey_Buban_Curriculum_Vitae.pdf', $response->headers->get('content-disposition'));
    }

    public function test_portfolio_contains_download_link(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('/download-cv');
    }
}
