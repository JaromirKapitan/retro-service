import React, { useEffect } from 'react'
import PhotoSwipeLightbox from 'photoswipe/lightbox'
import 'photoswipe/style.css'

export interface Image {
  url: string
  thumb_url: string
  // width: number
  // height: number
}

const VehicleGallery = ({ id, images }: { id: string, images: Image[] }) => {
  useEffect(() => {
    let lightbox = new PhotoSwipeLightbox({
      gallery: '#' + id,
      children: 'a',
      pswpModule: () => import('photoswipe'),
    })

    lightbox.init()

    return () => {
      lightbox.destroy()
    }
  }, [])

  return (
    <div className="pswp-gallery grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id={id}>
      {images.map((image, index) => (
        <a
          href={image.url}
          data-pswp-width={480/9*16}
          data-pswp-height={480}
          key={id + '-' + index}
          target="_blank"
          rel="noreferrer"
        >
          <img src={image.thumb_url} alt="" />
        </a>
      ))}
    </div>
  )
}

export default VehicleGallery