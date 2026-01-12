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
    <div className="pswp-gallery" id={id}>
      {images.map((image, index) => (
        <a
          href={image.url}
          data-pswp-width={1280}
          data-pswp-height={720}
          key={id + '-' + index}
          target="_blank"
          rel="noreferrer"
        >
          <img src={image.thumb_url.replace('http://retro-servis.test', '')} alt="" />
        </a>
      ))}
    </div>
  )
}

export default VehicleGallery