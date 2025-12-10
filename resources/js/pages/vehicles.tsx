import Hero from '@/components/misc/Hero'
import Header from '@/components/nav/Header'
import Container from '@/components/ui/container'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import React from 'react'

const VehiclesPage = () => {
  return (
    <>
      <Header />
      <Hero size='lg'>
        <h1 className='text-4xl font-semibold text-center'>Vozidla</h1>
      </Hero>
      <Container className='grid grid-cols-[384px_1fr] gap-4 p-4'>
        <section className='flex flex-col gap-4 w-full h-full p-4 bg-primary-foreground rounded-2xl'>
          <h1 className='text-center text-2xl'>Filtre</h1>
          <Label>Typ</Label>
          <Select>
            <SelectTrigger className='w-full'>
              <SelectValue placeholder='Vyberte typ vozidla' />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value='motorcykl'>Motocykl</SelectItem>
              <SelectItem value='auto'>Auto</SelectItem>
              <SelectItem value='autobus'>Autobus</SelectItem>
            </SelectContent>
          </Select>
          <Label>Znacka</Label>
          <Select>
            <SelectTrigger className='w-full'>
              <SelectValue placeholder='Vyberte typ vozidla' />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value='citroen'>Citroën</SelectItem>
              <SelectItem value='fiat'>Fiat</SelectItem>
              <SelectItem value='jawa'>Jawa</SelectItem>
              <SelectItem value='skoda'>Škoda</SelectItem>
              <SelectItem value='trabant'>Trabant</SelectItem>
            </SelectContent>
          </Select>
          <Label>Model</Label>
          <Select>
            <SelectTrigger className='w-full'>
              <SelectValue placeholder='Vyberte typ vozidla' />
            </SelectTrigger>
            <SelectContent>
              <SelectItem value='motorcykl'>Motocykl</SelectItem>
              <SelectItem value='auto'>Auto</SelectItem>
              <SelectItem value='autobus'>Autobus</SelectItem>
            </SelectContent>
          </Select>
          <Label>Rok</Label>
          <Input type='text' />
        </section>
        <section className='grid grid-cols-4 p-4 bg-primary-foreground rounded-2xl'>
          <div className='p-4'></div>
          <div className='p-4'></div>
          <div className='p-4'></div>
          <div className='p-4'></div>
          <div className='p-4'></div>
          <div className='p-4'></div>
        </section>
      </Container>
    </>
  )
}

export default VehiclesPage