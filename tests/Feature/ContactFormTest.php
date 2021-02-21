<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /** @test */
    public function main_page_contains_contact_form_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('contact-form');
    }

    /** @test */
    public function contact_form_sends()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Ellington Brambila')
            ->set('email', 'contato@ellingtonb.com')
            ->set('phone', '+55 47 98455-7723')
            ->set('message', 'Hello there!')
            ->call('submitForm')
            ->assertSee('We received your message successfully and will get back to you shortly!');
    }

    /** @test */
    public function contact_form_name_field_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('email', 'contato@ellingtonb.com')
            ->set('phone', '+55 47 98455-7723')
            ->set('message', 'Hello there!')
            ->call('submitForm')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function contact_form_name_field_has_minimum_characters()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'El')
            ->call('submitForm')
            ->assertHasErrors(['name' => 'min']);
    }

    /** @test */
    public function contact_form_email_field_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Ellington Brambila')
            ->set('phone', '+55 47 98455-7723')
            ->set('message', 'Hello there!')
            ->call('submitForm')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function contact_form_email_field_is_email()
    {
        Livewire::test(ContactForm::class)
            ->set('email', 'contato.ellingtonb.com')
            ->call('submitForm')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function contact_form_message_field_is_required()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'Ellington Brambila')
            ->set('email', 'contato@ellingtonb.com')
            ->set('phone', '+55 47 98455-7723')
            ->call('submitForm')
            ->assertHasErrors(['message' => 'required']);
    }

    /** @test */
    public function contact_form_message_field_has_minimum_characters()
    {
        Livewire::test(ContactForm::class)
            ->set('message', 'Hell')
            ->call('submitForm')
            ->assertHasErrors(['message' => 'min']);
    }

    /** @test */
    public function contact_form_phone_field_has_minimum_characters()
    {
        Livewire::test(ContactForm::class)
            ->set('phone', '+55479845577')
            ->call('submitForm')
            ->assertHasErrors(['phone' => 'min']);
    }
}
