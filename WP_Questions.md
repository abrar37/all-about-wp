1. **Question:** Which of the following plugin related functions can you see in WordPress?  
   **Options:**  
   - plugin_basename  
   - plugin_size  
   - **plugins_url**  ✅  
   - plugin_created_date  
   - **plugin_dir_path**  ✅  
   - plugin.meta_info  

2. **Question:** Which are the filter hooks that come with a WordPress installation?  
   **Options:**  
   - remove_filter()  
   - **add_filter()**  ✅  
   - **apply_filters()**  ✅  
   - sanitize_filter()  
   - merge_filters()  
   - delete_filter()  

3. **Question:** All PHP files in your plugin need to have the header comment.  
   **Options:**  
   - True  
   - **False**  ✅

4. **Question:** When you create a plugin, you need to have a header comment. What field is required for the header comment?  
   **Options:**  
   - **Plugin name**  ✅  
   - Plugin URL  
   - Version  
   - Plugin ID    

5. **Question:** How can you increase the memory limit of WordPress?  
    **Options:**  
    - define("WP_MEMORY_NOEXCEED", '256M'); in wp-setting.php  
    - define("WP_MEMORY_LIMIT", '256M'); in wp-setting.php  
    - **define("WP_MEMORY_LIMIT", '256M'); in wp-config.php**  ✅  
    - define("WP_MEMORY_NOEXCEED", '256M'); in wp-config.php  

6. **Question:** Hiding the version number of your WordPress installation is a good security practice. How do you do it?  
    **Options:**  
    - remove_action(wp_remove_version', wp_generator);  
    - remove_action(wp_version', wp_generator);  
    - **remove_action(wp_head', wp_generator);**  ✅  
    - remove_action(wp_head', wp_remove_version);  

7. **Question:** What piece of code returns the directory path of the plugin?  
    **Options:**  
    
    - plugin_basename($file);
    - **plug_dir_path( $file );** ✅  
    - plugin_info($file);
    - plugin_content_dir($file);

8. **Question:** What are the WordPress functions related to comments?  
    **Options:**  
    - **wp_allow_comment**  ✅  
    - wp.remove_comment  
    - **wp_count_comment**  ✅  
    - wp_block_comment  
    - wp.delete_comment  
    - wp.publish_comment  

9. **Question:** How many database tables are there in the default WordPress installation?  
    **Options:**  
    - 10  
    - **11**  ✅  
    - 12  
    - 13  

10. **Question:** Which of the following is not a default widget in WordPress installation?  
    **Options:**  
    - Navigation Menu  
    - **Ninja Form**  ✅  
    - Calendar  
    - Archive  

11. **Question:** Enabling GZIP compression and using CDNs can speed up your WordPress site.  
    **Options:**  
    - **True**  ✅  
    - False  

12. **Question:** The option of changing the URL of a post is called ______.  
    **Options:**  
    - Attrlink  
    - **Permalink**  ✅  
    - LinkName  
    - URLlink  

13. **Question:** How do you retrieve the page when the URL is given?  
    **Options:**  
    - **get_page_by_path()**  ✅  
    - get_page_by_url()  
    - get_page_by_url()  
    - get_page_by_link()  

14. **Question:** How do you enable support for post thumbnails?  
    **Options:**  
    - add_theme_support('thumbnails');  
    - enable_support('post-thumbnails');  
    - **add_theme_support('post-thumbnails');**  ✅  
    - enable_theme_support('thumbnails');  

15. **Question:** You need to enable mod_rewrite in order to get pretty permalinks.  
    **Options:**  
    - **True**  ✅  
    - False  

16. **Question:** Post format can be taken using the following function.  
    **Options:**  
    - wp_get_format($post_id);  
    - **get_post_format($post_id);**  ✅  
    - wp_post_format($post_id);  
    - wp_get_post_format($post_id);  

17. **Question:** You can create a WordPress post using the ______ function.  
    **Options:**  
    - **wp_insert_post()**  ✅  
    - wp_create_post()  
    - wp_add_post()  
    - wp_new_post()  

18. **Question:** Stricter commenting rules are useful as a preventive measure against spam. Where can you find this option?  
    **Options:**  
    - Settings – Security  
    - Settings – SpamControl  
    - **Settings – Discussion**  ✅  
    - Settings – Appearance  

19. **Question:** Which are security plugins?  
    **Options:**  
    - **BulletProof**  ✅  
    - Yoast  
    - WP Rocket  
    - **Sucuri**  ✅  

20. **Question:** You can determine if the current user is logged in by using ______.  
    **Options:**  
    - is_login_visitor()  
    - is_login_user()  
    - is_visitor_logged_in()  
    - **is_user_logged_in()**  ✅  

21. **Question:** Which of the following database tables is used only in a multisite installation?  
    **Options:**  
    - **$blogs table**  ✅  
    - $options table  
    - $links table  
    - $terms table  

22. **Question:** Which of the following code snippets can prevent SQL injections?  
    **Options:**  
    - mysql_real_escape_injection()  
    - **mysql_real_escape_string()**  ✅  
    - mysql_escape_string()  
    - mysql_injection_escape_string()  

23. **Question:** wp_meta is a Filter type hook.  
    **Options:**  
    - **True**  ✅  
    - False  
 