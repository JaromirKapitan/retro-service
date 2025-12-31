import Hero from '@/components/misc/Hero'
import { Badge } from '@/components/ui/badge'
import Container from '@/components/ui/container'
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs'
import VehicleFeatures from '@/components/vehicle/VehicleFeatures'
import BaseLayout from '@/layouts/BaseLayout'
import { useEffect, useState } from 'react'

const VehiclePage = () => {
  const [activeTab, setActiveTab] = useState('description')

  useEffect(() => {
    const handleHashChange = () => {
      const hash = window.location.hash.replace('#', '')
      const validTabs = ['description', 'docs&links', 'photogallery']
      
      if (validTabs.includes(hash)) {
        setActiveTab(hash)
      }
    }

    handleHashChange()
  }, [])

  const onTabChange = (value: string) => {
    setActiveTab(value)
    console.log('set to: ', value)
    window.history.pushState(null, '', `#${value}`)
  }

  return (
    <BaseLayout>
      <Hero img='https://stage.retro-service.eu/images/no_image_car.jpg'>
        <div className='flex flex-col gap-4 items-center justify-center relative'>
          <h1 className='text-4xl font-semibold text-center'>Vehicle</h1>
          <div className='flex gap-4 absolute right-4 -bottom-28'>
            <Badge>Auto</Badge>
            <Badge>1992 - 1993</Badge>
          </div>
        </div>
      </Hero>
      <Container className='p-4'>
        <Tabs value={activeTab} onValueChange={onTabChange} defaultValue="description">
          <TabsList className="mx-auto mt-4 flex-col h-auto w-full md:w-auto md:flex-row">
            <TabsTrigger className='w-full' value="description">Description</TabsTrigger>
            <TabsTrigger className='w-full' value="features">Features</TabsTrigger>
            <TabsTrigger className='w-full' value="docs&links">Documents & Links</TabsTrigger>
            <TabsTrigger className='w-full' value="photogallery">Photogallery</TabsTrigger>
          </TabsList>
          <TabsContent value="description" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
            <h1>Hello world!</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias veniam a veritatis voluptate esse ut debitis reprehenderit fuga culpa, soluta cum obcaecati facilis, rerum fugiat! Saepe doloribus dolores ratione voluptate.</p>
          </TabsContent>
          <TabsContent value="features" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
            <VehicleFeatures />
          </TabsContent>
          <TabsContent value="docs&links" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
            <h2>Dokumenty</h2>
            <ul>
              <li>Dokument 1: <a href="#">https://example.com</a></li>
              <li>Dokument 2</li>
              <li>Dokument 3</li>
            </ul>
          </TabsContent>
          <TabsContent value="photogallery" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
            <h2>Fotogaleriá</h2>
            <ul>
              <li>Fotogaleria 1</li>
              <li>Fotogaleria 2</li>
              <li>Fotogaleria 3</li>
            </ul>
          </TabsContent>
        </Tabs>
      </Container>
    </BaseLayout>
  )
}

export default VehiclePage