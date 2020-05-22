<?php if ($this->uri->segment(1) == 'link'): ?>
	<script type="application/ld+json">
	  {
	    "@context": "http://schema.org",
	    "@type": "Product",
	    "@id": "<?= str_replace(' ','_',$single['judul']) ?>",
	    "name": "<?= @$single['judul'] ?>",
	    "image": "<?= base_url('image/'.$single['gambar']) ?>",
	    "gtin8": "<?= str_replace(' ','_',$single['judul']) ?>",
	    "description": "<?= @$optiomation['description'] ?>",
	    "aggregateRating": {      
	      "@type": "AggregateRating",
	      "reviewCount": "<?= $review_total ?>",      
	      "ratingValue": "<?= $review_ratting ?>"    
	    },
	    "brand": "<?= $optiomation['sitename'] ?>",	    
	    <?php if (round($single['price']) != 0): ?>	    
	    "offers": {
	      "@type":"Offer",    
	      "priceCurrency": "<?= $main['label']['Price Currency'] ?>",
	      "price": "<?= $single['price'] ?>",
	      "url": "<?= current_url() ?>",
	      "availability": "http://schema.org/InStock"
	    },	   
	    <?php endif ?>
	    "sku": "<?= str_replace(' ','_',$single['judul']) ?>"
	  }
	</script>
<?php elseif ($this->uri->segment(1) == 'Blog'): ?>
	<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "@id" : "<?= str_replace(' ','_',$single['judul']) ?>",
      "datePublished": "<?= $single['detail_created_at'] ?>",
      "dateModified": "<?= $single['detail_updated_at'] ?>",         
      "headline": "<?= @$single['judul'] ?>",
      "image": "<?= base_url('image/'.$single['gambar']) ?>",      
      "articleBody": "<?= @$optiomation['description'] ?>",
      "aggregateRating": {      
        "@type": "AggregateRating",
        "reviewCount": "<?= $review_total ?>",      
        "ratingValue": "<?= $review_ratting ?>"    
      },    
      "author": {
        "@type":"Thing",    
        "name": "<?= $optiomation['sitename'] ?>"      
      },
      "publisher": {
        "@type":"Organization",
        "name": "<?= $optiomation['sitename'] ?>",      
        "logo":  {
            "@type": "ImageObject",
            "name": "myOrganizationLogo",          
            "url": "<?= base_url('image').'/'.$main['profile_website']['logo'] ?>"
        }
      },
      "mainEntityOfPage": {
       "@type": "WebPage",
       "@id": "<?= current_url() ?>"
      }
    }
  </script>
<?php elseif(isset($param) && $param == 'page'): ?>
<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "@id" : "<?= str_replace(' ','_',$single['judul']) ?>",
      "datePublished": "<?= $single['detail_created_at'] ?>",
      "dateModified": "<?= $single['detail_updated_at'] ?>",         
      "headline": "<?= @$single['judul'] ?>",
      "image": "<?= base_url('image/'.$single['gambar']) ?>",      
      "articleBody": "<?= @$optiomation['description'] ?>",
      "aggregateRating": {      
        "@type": "AggregateRating",
        "reviewCount": "<?= $review_total ?>",      
        "ratingValue": "<?= $review_ratting ?>"    
      },    
      "author": {
        "@type":"Thing",    
        "name": "<?= $optiomation['sitename'] ?>"      
      },
      "publisher": {
        "@type":"Organization",
        "name": "<?= $optiomation['sitename'] ?>",
        "logo":  {
            "@type": "ImageObject",
            "name": "myOrganizationLogo",          
            "url": "<?= base_url('image').'/'.$main['profile']['logo'] ?>"
        }
      },
      "mainEntityOfPage": {
       "@type": "WebPage",
       "@id": "<?= current_url() ?>"
      }
    }
</script>
<?php endif ?>
<?php $i = 0; ?>
<?php if (isset($breadcrumb)): ?>
	<?php $i++; ?>
	<script type="application/ld+json">
	  {
	    "@context": "http://schema.org",
	    "@type": "BreadcrumbList",
	    "itemListElement": [
	    <?php foreach ($breadcrumb  as $row): ?>
	      {
	        "@type": "ListItem", 
	        "name": "<?= $row['name'] ?>", 
	        "position": "<?= $i ?>", 
	        "item": {
	          "@type": "Thing", 
	          "@id": "<?php if ($row['url']): ?><?= $row['url'] ?><?php else: ?><?= current_url() ?><?php endif ?>"
	        }
	      }
	      <?php if ($row != end($breadcrumb)): ?>,<?php endif ?>
	    <?php endforeach ?>
	    ]
	  }
	</script>
<?php endif ?>